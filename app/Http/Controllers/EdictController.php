<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;

class EdictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Vacancy::with('edict')->orderBy('created_at','desc')->paginate(20);
        return view('vacancy/index',compact('data', $data));
    }

    public function edict($id, Request $request)
    {
        $data = \App\Vacancy::with('edict')->where('edict_id','=', $id)->first();
        if(empty($data)){
            return redirect('/');
        }
        Helper::createSessionEdict($id);
        return view('vacancy.edicts',compact('data', $data));
    }
    
    public function home()
    {
        $data = \App\Vacancy::with('edict')->where('edict_id','=', 1)->first();
        
        Helper::createSessionEdict(1);
        return view('vacancy.edicts',compact('data', $data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list($id, Request $request)
    {
        Helper::createSessionEdict($id);
        return view('vacancy/login', compact('data'));

    }
}

