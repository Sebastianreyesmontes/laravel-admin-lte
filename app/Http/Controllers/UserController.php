<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('can:crud-users.view')->only('index');
        $this->middleware('can:crud-users.edit')->only('edit');
        $this->middleware('can:crud-users.delete')->only('delete');
    }
    public function index()
    {
        $usuarios = User::get()->toArray();
        // dd($usuarios);
        return view ('admin/view-users')->with(compact('usuarios'));
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('succes_message','El usuario ha sido eliminado exitosamente!');
    }

    public function edit(Request $request, $id=null)
    {
        if($id==""){
            $title = "Añadir Usuario";
            $newuser = new User;
            $message = "Se ha creado con exito el nuevo usuario";
        }else{
            $title = "Editar Usuario";
            $newuser = User::find($id);
            $message = "Se ha actualizado con exito el usuario";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // validaciones
            $rules = [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ];
            $rulesMessages = [
                'name.required' => 'Por favor, ingrese un nombre',
                'email.required' => 'Por favor, ingrese un correo electronico',
                'password.required' => 'Por favor, ingrese una contraseña'
            ];
            $this->validate($request,$rules,$rulesMessages);

            $newuser->name =$data['name'];
            $newuser->email=$data['email'];
            $newuser->password=$data['password'];
            // dd($data);
            $newuser->assignRole('user')->save();
            return redirect('crud-users/ver')->with('success_message', $message);
        }
        return view('admin/create-users')->with(compact('title','newuser'));
    }
}
