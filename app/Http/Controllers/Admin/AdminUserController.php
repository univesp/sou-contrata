<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        // Example id
        $id = 225;

        // Return this view
        return view("admin.admin-user.index")
            ->with('id', $id);
    }
}
