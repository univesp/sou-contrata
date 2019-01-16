<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function editPersonalData($id)
    {
        // Return this view
        return view("admin.user.personal-data.edit")
            ->with('id', $id);
    }

    public function updatePersonalData($id, Request $request)
    {
        //
    }

    public function editAcademicData($id)
    {
        // Return this view
        return view("admin.user.academic-data.edit")
            ->with('id', $id);
    }

    public function updateAcademicData($id, Request $request)
    {
        //
    }
}
