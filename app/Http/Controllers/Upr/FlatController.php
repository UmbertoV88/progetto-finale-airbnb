<?php

namespace App\Http\Controllers\Upr;
use App\Flat;
use App\Http\Controllers\Controller; // Devo aggiungere questo namespace per dirgli di usare il controller
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlatController extends Controller
{

    public function index()
    {
        // Seleziono tutti i Flat dell'utente:
        $utente = Auth::user();
        $flats = $utente->flats()->get();
        return view("upr.flats.index", compact("flats"));
    }

    public function create()
    {
        // Consento la creazione di un nuovo flat:
        return view("upr.flats.create");
    }

    public function store(Request $request)
    {
        // Metto il flat nel DB:
        $data = $request->all();
        $flat = new Flat();
        $flat->user_id = Auth::user()->id;
        $flat->fill($data);
        $flat->save();
        return redirect()->route("upr.home");
    }

    public function show($id)
    {
        // Visualizzo la pagina di dettaglio del singolo appartamento:
        $flat = Flat::find($id);
        return view("upr.flats.show", ["flat" => $flat]);
    }

    public function edit(Flat $flat)
    {
        // Visualizzo la pagina di modifica del singolo appartamento:
        return view("upr.flats.edit", ["flat" => $flat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flat $flat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        //
    }
}
