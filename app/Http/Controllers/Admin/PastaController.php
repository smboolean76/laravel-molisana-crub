<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::all();

        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // prendo tutti i dati
        $data = $request->all();
        // creo l'oggetto model
        $new_pasta = new Pasta();
        // compilo l'oggetto (o meglio le sue proprietà)
        // $new_pasta->title = $data['title'];
        // $new_pasta->type = $data['type'];
        // $new_pasta->cooking_time = $data['cooking_time'];
        // $new_pasta->weight = $data['weight'];
        // $new_pasta->description = $data['description'];
        $new_pasta->fill($data);
        // salvo (creo a db la riga)
        $new_pasta->save();

        // rendirizzo l'utente alla pagina della pasta appena creata
        return redirect()->route('pastas.show', $new_pasta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        // $pasta = Pasta::where('id', $id)->first();
        // $pasta = Pasta::find($id);

        return view('pastas.show', compact('pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasta $pasta)
    {
        return view('pastas.edit', compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pasta)
    {
        // recupero tutti i dati del form
        $data = $request->all();
        // aggiorno la risorsa per intero
        $pasta->update($data);
        // faccio un redirect alla pagina index
        return redirect()->route('pastas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();

        return redirect()->route('pastas.index');
    }
}
