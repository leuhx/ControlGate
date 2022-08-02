<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visits;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visits::all()->sortBy('id');
        return view('visits.visits')->with('visits', $visits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'visitor_id' => 'required',
            'user_id' => 'required',
        ]);

        $visits = new Visits;
        $visits->visitor_id = $request->input('visitor_id');
        $visits->user_id = $request->input('user_id');
        $visits->status = "waiting";
        $visits->save();
        return redirect('/visits')->with('success', 'Visita cadastrado com sucesso!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visits = Visits::find($id);
        return view('visits.edit')->with('visits', $visits);
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
        $this->validate($request, [
            'visitor_id' => 'required',
            'user_id' => 'required',
        ]);

        $visits = Visits::find($id);
        $visits->visitor_id = $request->input('visitor_id');
        $visits->user_id = $request->input('user_id');
        $visits->status = $request->input('status');
        $visits->save();
        return redirect('/visits')->with('success', 'Visita atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visits = Visits::find($id);
        $visits->delete();
        return redirect('/visits')->with('success', 'Visita removido com sucesso!');
    }
}
