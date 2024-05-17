<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Project_processes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function index()
    {
        $proyectos = Project::get()->toArray();
        // dd($usuarios);
        return view('projects')->with(compact('proyectos'));
    }

    public function store(Request $request)
    {
        // Valida y guarda los datos básicos del proyecto
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->state = $request->input('state');
        $project->project_leader = $request->input('project_leader');
        $project->company_client = $request->input('company_client');
        $project->estimated_budget = $request->input('estimated_budget');
        $project->total_spent = $request->input('total_spent');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');

        $project->save();

        // Obtén los miembros seleccionados desde el formulario (puedes modificar esta lógica según tu formulario)
        $memberIds = $request->input('members'); // Supongamos que 'members' es un arreglo de IDs de usuarios

        // Asigna los miembros al proyecto
        $project->users()->attach($memberIds);

        // Obten el ID del líder del proyecto desde el formulario
        $leaderId = $request->input('leader'); // Supongamos que 'leader' es el ID del líder

        // Asigna el líder al proyecto
        $project->users()->attach($leaderId, ['is_leader' => true]);

        return redirect()->route('projects.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function edit(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Crear Proyecto";
            $newproject = new Project;
            $message = "Se ha creado con exito el nuevo proyecto";
        } else {
            $title = "Editar Proyecto";
            $newproject = Project::find($id);
            $message = "Se ha actualizado con exito el proyecto";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Validaciones
            $rules = [
                'name' => 'required',
                'object' => 'required',
                'contractor' => 'required',
                'estimated_budget' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ];

            $rulesMessages = [
                'name.required' => 'Por favor, ingrese el nombre del proyecto',
                'object.required' => 'Por favor, ingrese el objetivo del proyecto',
                'contractor.required' => 'Por favor, ingrese el contratista',
                'estimated_budget.required' => 'Por favor, ingrese un presupuesto estimado',
                'start_date.required' => 'Por favor, ingrese una fecha de inicio',
                'start_date.date' => 'La fecha de inicio debe ser una fecha válida',
                'end_date.required' => 'Por favor, ingrese una fecha de finalización',
                'end_date.date' => 'La fecha de finalización debe ser una fecha válida',
            ];
            $this->validate($request, $rules, $rulesMessages);

            $newproject->name = $data['name'];
            $newproject->object = $data['object'];
            // $newproject->state = $data['stage'];
            $newproject->project_leader = $data['project_leader'];
            $newproject->contractor = $data['contractor'];
            $newproject->estimated_budget = $data['estimated_budget'];
            if (empty($newproject['start_date'])) {
                $newproject['start_date'] = date('Y-m-d');
            }
            $newproject->end_date = $data['end_date'];

            // dd($data);
            $newproject->save();

            // dd($data['name']);
            // Crear la carpeta del proyecto en Laravel File Manager
            $projectFolderPath = 'Proyectos/' . Str::slug($data['name']); // Utiliza el nombre del proyecto como nombre de carpeta
            Storage::disk('public')->makeDirectory($projectFolderPath);

            return redirect('proyectos')->with('success_message', $message);
        }
        return view('projects-create')->with(compact('title', 'newproject'));
    }

    public function delete($id)
    {
        Project::where('id', $id)->delete();
        return redirect()->back()->with('succes_message', 'El proyecto ha sido eliminado exitosamente!');
    }

    public function view(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return abort(404); // Maneja el caso si el proyecto no existe
        }

        $processes = Project_processes::where('project_id', $id)->get();

        // Inicializa un array para agrupar los procesos por etapa
        $stages = [
            'Planificación' => [],
            'Ejecución' => [],
            'Cierre' => [],
        ];

        // Agrupa los procesos por etapa
        foreach ($processes as $process) {
            $stage = $process->stage;
            $stages[$stage][] = $process;
        }

        // dd($project);
        // dd($processes);
        $projectFolderPath = 'Proyectos/' . Str::slug($project->name);

        $planningProcesses = $processes->filter(function ($process) {
            return $process->stage === 'Planificación';
        });

        $executionProcesses = $processes->filter(function ($process) {
            return $process->stage === 'Ejecución';
        });

    // Filtra los procesos de la etapa "Cierre"
        $closureProcesses = $processes->filter(function ($process) {
            return $process->stage === 'Cierre';
        });

        return view('projects-view', compact('project', 'stages', 'projectFolderPath', 'processes', 'planningProcesses', 'executionProcesses', 'closureProcesses'));
    }

    public function createProcess(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return abort(404);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            // Inicializa 'file_paths' como un array vacío
            $filepaths = [];

            if ($request->hasFile('file')) {
                $files = $request->file('file');

                $projectFolder = 'Proyectos/' . Str::slug($project->name);
                $stageFolder = $projectFolder . '/Etapa/' . Str::slug($data['stage']);

                Storage::disk('public')->makeDirectory($stageFolder);

                foreach ($files as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName(); // Nombre único

                    try {
                        $path = $file->storeAs($stageFolder, $fileName, 'public');
                        $filepaths[] = $path; // Guarda la ruta del archivo
                    } catch (\Exception $e) {
                        info('Error al cargar un archivo: ' . $e->getMessage());
                    }
                }
            } else {
                info('Ningún archivo cargado'); // Registro de ningún archivo cargado
            }

            // Crea el proceso y asocia las rutas de archivo
            $process = new Project_processes([
                'name' => $data['name'],
                'description' => $data['description'],
                'stage' => $data['stage'],
                'file_paths' => json_encode($filepaths), // Almacena rutas como JSON
            ]);

            $project->processes()->save($process);

            info('Proceso creado con éxito'); // Registro de éxito

            return redirect()->route('project.view', ['id' => $id])->with('success_message', 'Proceso creado con éxito.');
            // return redirect()->route('project.view', ['id' => $id])->with('success_data', $data);
        }

        // Mostrar el formulario para crear el proceso
        return view('project-process', compact('project'));
    }

    public function addMembers(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return abort(404);
        }

        // Obtén los usuarios seleccionados del formulario
        $selectedUsers = $request->input('members', []);

        // Asocia los usuarios seleccionados con el proyecto
        $project->members()->sync($selectedUsers);

        return redirect()->route('project.view', ['id' => $id])->with('success_message', 'Miembros del proyecto actualizados con éxito.');
    }
}
