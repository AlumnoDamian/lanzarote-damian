<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin')->only(['index']); 
        $this->middleware('role:admin|user')->only(['show']); 
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);        
    }
}
