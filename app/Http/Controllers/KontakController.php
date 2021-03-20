<?php

namespace App\Http\Controllers;

use App\Http\Resources\KontakResource;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Kontak::all();
        return KontakResource::collection($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $emp = new Kontak;
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new KontakResource($emp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Kontak::find($id); //id comes from route
        if( $article ){
            return new KontakResource($article);
        }
        return "Kontak Not found"; // temporary error
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $emp = Kontak::find($id);
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new KontakResource($emp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Kontak::findOrfail($id);
        if($emp->delete()){
            return  new KontakResource($emp);
        }
        return "Error while deleting";
    }
}
