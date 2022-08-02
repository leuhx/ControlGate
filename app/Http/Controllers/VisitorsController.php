<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitors;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitors::all()->sortBy('id');
        return view('visitors.visitors')->with('visitors', $visitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitors.create');
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
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'phone' => 'required',
        ]);

        $visitor = new Visitors;
        $visitor->name = $request->input('name');
        $visitor->cpf = $request->input('cpf');
        $visitor->rg = $request->input('rg');
        $visitor->phone = $request->input('phone');
        $visitor->save();
        return redirect('/visitors')->with('success', 'Visitante cadastrado com sucesso!');
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
        $visitor = Visitors::find($id);
        return view('visitors.edit')->with('visitor', $visitor);
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
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'phone' => 'required',
        ]);

        $visitor = Visitors::find($id);
        $visitor->name = $request->input('name');
        $visitor->cpf = $request->input('cpf');
        $visitor->rg = $request->input('rg');
        $visitor->phone = $request->input('phone');
        $visitor->save();
        return redirect('/visitors')->with('success', 'Visitante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitors::find($id);
        $visitor->delete();
        return redirect('/visitors')->with('success', 'Visitante removido com sucesso!');
    }
}
