<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Candidate;
use DB;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        // List all users
        $users = User::all();

        // Return this view
        return view("admin.admin-user.index")
            ->with('users', $users);
    }

    public function changeStatus()
    {
        // Get id
        $id = Input::get('id');
        
        // Find user by id
        $user = User::find($id);

        // Compare if user enabled is on/off
        $user->flag_ativo = !$user->flag_ativo;
        
        // Save in database
        $user->save();

        // Return result
        return response()->json($user);
    }
}
