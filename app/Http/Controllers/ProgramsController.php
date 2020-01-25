<?php

namespace App\Http\Controllers;

use App\programs;
use Illuminate\Http\Request;

class programsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = programs::all();
        return view('programs.index')->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('programs.create');
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
         //
         $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',

        ]);

        //Create new post
            $programs = new programs;
            $programs->name = $request->input('name');
            $programs->description = $request->input('description');
            $programs->duration = $request->input('duration');
            $programs->price = $request->input('price');
            $programs->save();

            return redirect('/program')->with('success','Programs created');
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
        $programs = programs::find($id);
        return view('programs.show')->with('programs', $programs);

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
        $programs = programs::find($id);
        return view('programs.edit')->with('programs', $programs);
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
        $this->validate($request,[
           'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
        ]);

        //Create new post
            $programs = programs::find($id);
            $programs->name = $request->input('name');
            $programs->description = $request->input('description');
            $programs->duration = $request->input('duration');
            $programs->price = $request->input('price');

            $programs->save();

            return redirect('/program')->with('success', 'Programs successfully updated');
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
        $programs = programs::find($id);
        $programs->delete();
        return redirect('/programs')->with('success', 'programs successfully deleted');
    }
}
