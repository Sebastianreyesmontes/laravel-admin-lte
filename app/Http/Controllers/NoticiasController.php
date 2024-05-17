<?php

namespace App\Http\Controllers;

class NoticiasController extends Controller
{
    // public function __invoke(){
    //     return view("noticias");
    // }

    // public function index(){
    //     dd('Test');
    //     return view("Prehome/noticias")->with(compact('news'));
    // }
    

    public function index()
    {
        return view("noticias")->with(compact('news'));
    }

}
