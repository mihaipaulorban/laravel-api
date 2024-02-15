<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('indextype', compact('types'));
    }

    // Funzione create
    public function create()
    {
        return view('createtech', ['resourceType' => 'type']);
    }

    // Funzione store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Type::create($validatedData);
        return redirect()->route('admin.types.index');
    }

    // Funzione di Edit
    public function edit(Type $type)
    {
        return view('edittech', ['resourceType' => 'type', 'resource' => $type]);
    }

    // Funzione di Update
    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $type->update($validatedData);
        return redirect()->route('admin.types.index');
    }

    // Funzione di Delete
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
