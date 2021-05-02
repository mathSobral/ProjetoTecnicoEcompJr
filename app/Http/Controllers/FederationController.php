<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Federation;

class FederationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $federations = Federation::latest()->paginate(5);

        return view('federations.index', compact('federations'))
                 ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('federations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required'
        ]);

        Federation::create($request->all());

        return redirect()->route('federations.index')
            ->with('success', 'Federação cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function show(Federation $federation)
    {
        return view('federations.show', compact('federation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function edit(Federation $federation)
    {
        return view('federations.edit', compact('federation'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Federation $federation)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
        ]);
        $federation->update($request->all());

        return redirect()->route('federations.index')
            ->with('success', 'Federação atualizada com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Federation $federation)
    {
        $federation->delete();

        return redirect()->route('federations.index')
            ->with('success', 'Federação apagada com sucesso!');
    }
}
