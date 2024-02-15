<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Database\QueryException;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('indextech', compact('technologies'));
    }


    // Funzione create
    public function create()
    {
        return view('createtech', ['resourceType' => 'technology']);
    }


    public function store(Request $request)
    {
        try {
            // Codice per salvare la nuova tecnologia
            $technology = new Technology();
            $technology->name = $request->input('name');
            $technology->save();

            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia creata con successo.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {

                // Gestisce il caso di duplicato
                return back()->withErrors(['name' => 'Il nome della tecnologia è già in uso.'])->withInput();
            }
        }
    }

    // Funzione di Edit
    public function edit(Technology $technology)
    {
        return view('edittech', ['resourceType' => 'technology', 'resource' => $technology]);
    }

    // Funzione di Update
    public function update(Request $request, string $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->name = $request->name;
        $technology->save();

        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated successfully');
    }

    // Funzione per eliminazione
    public function destroy($id)
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia eliminata con successo.');
    }
}
