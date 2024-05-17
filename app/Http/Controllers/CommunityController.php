<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function showUsers()
    {
        // Obtener todos los usuarios con un rol específico (por ejemplo, el rol "user")
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        // Devolver la vista y pasar la colección de usuarios como variable
        return view('community', compact('users'));
    }
}
