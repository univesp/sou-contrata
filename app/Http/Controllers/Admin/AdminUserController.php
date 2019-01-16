<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
