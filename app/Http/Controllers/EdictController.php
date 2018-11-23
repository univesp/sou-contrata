<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {

        //$uri = explode('/',$_SERVER {'REQUEST_URI'});
        // $editalid=end ($uri);
        //dd($editalid);
        //return view('');
        //dd($id);

       // $data = \App\Vacancy::with('edict')->find($id);

       // $request->session()->put('edictId', $data->id);
        //return view('vacancy/edicts',compact('data'));


        //
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
        $request->session()->put('edital_id', $id);
        return view('vacancy/login', compact('data'));

    }
}

