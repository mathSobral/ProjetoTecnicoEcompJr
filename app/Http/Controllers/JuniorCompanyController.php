<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Federation;
use App\Models\JuniorCompany;

class JuniorCompanyController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $junior_companies = JuniorCompany::latest()->paginate(5);

        return view('junior_companies.index', compact('junior_companies'))
                 ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $federations =  Federation::all();
        return view('junior_companies.create', compact('federations'));
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
            'federation_id' => 'required'
        ]);

        JuniorCompany::create($request->all());

        return redirect()->route('junior_companies.index')
            ->with('success', 'Empresa Junior cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function show(JuniorCompany $junior_companie)
    {
        return view('junior_companies.show', compact('junior_companie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $junior_companie = JuniorCompany::find($id);
        $federations =  Federation::all();
        return view('junior_companies.edit', compact('junior_companie', 'federations'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JuniorCompany  $junior_companie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $junior_companie = JuniorCompany::find($id);
        $request->validate([
            'name' => 'required',
            'federation_id' => 'required',
        ]);
        $junior_companie->update($request->all());

        return redirect()->route('junior_companies.index')
            ->with('success', 'Empresa Junior atualizada com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JuniorCompany  $junior_companie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $junior_companie = JuniorCompany::find($id);
        $junior_companie->delete();

        return redirect()->route('junior_companies.index')
            ->with('success', 'Empresa Junior apagada com sucesso!');
    }

    public function search(Request $request){
        $junior_companies = JuniorCompany::where('name', 'LIKE', "%{$request->name}%")->where('federation_id', '=', "{$request->federation_id}")->get();

        return view('junior_companies.index', compact('junior_companies'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;
    }
}
