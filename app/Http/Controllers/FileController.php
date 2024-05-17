<?php


namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {

        $files = FileUpload::all();


        return view('allfiles',compact('files', ));
    }

    public function create()
    {
        return view('uploadfiles');

    }
     public function edit()
     {
        return view ('editfiles');

     }
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required',
             'area' => 'required',
             'prop' => 'required',
             'arch'=> 'required',
             'docs' => 'required|file', //Es el atributo donde se guarda los archivos 


         ]);

         $fileUpload = new FileUpload();
         $fileUpload->name = $request->name;
         $fileUpload->area = $request->area;
         $fileUpload->prop = $request->prop;
         $fileUpload->arch = $request->arch;
         // $fileUpload->$fileIcons = $request->folesIcons; <-- this line was causing the error

         if($request->hasFile('docs')){
             $file=$request->file('docs');
             $fileName=time().'_'.$file->getClientOriginalName();

             $fileUpload->docs = $file->storeAs('archivos', $fileName, 'public');
             $fileExtension = $file->getClientOriginalExtension();
             $fileUpload->extension = $fileExtension;
         }

         $fileUpload->save();
         return view('allfiles', ['success'=>'Registro creado Correctamente']);
     }

   // public function edit(Request $request, $id = null)
   public function download($id)
   {
       $file = FileUpload::findOrFail($id);

       $filePath = storage_path('app/public/files/proyectos/' . $file->docs);

       if (file_exists($filePath)) {
           return response()->file(storage_path('app/public/files/proyectos/' . $file->docs), [
               'Content-Disposition' => 'attachment; filename="' . $file->filename . '.' . $file->docs . '"'
           ]);
       } else {
           abort(404);
       }
   }



    public function delete ($id)
    {
        FileUpload::where('id', $id)-> delete ();
        return redirect ()-> back () -> with ('succes_message', 'El archivo fue eliminado!');
    }
}