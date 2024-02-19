<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{

    // Mostra tutti i progetti
    public function index(Request $request)
    {

        $projects = Project::query()
            ->when($request->title, function ($q) use ($request) {
                return $q->where('title', 'like', "%{$request->title}%");
            })
            ->when($request->type, function ($q) use ($request) {
                return $q->where('type_id', $request->type);
            })
            ->get();

        return view('admin', [
            'projects' => $projects
        ]);
    }

    // Mostra la vista per creare un nuovo progetto
    public function create()
    {
        // Recupera tutti i tipi e le tecnologie
        $types = Type::all();
        $technologies = Technology::all();

        return view('create', compact('types', 'technologies'));
    }


    // Salva un nuovo progetto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'image' => 'nullable|image|max:2048',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',

        ]);

        // Gestione del caricamento dell'immagine
        if ($request->hasFile('image')) {
            // Carica la nuova immagine e ottieni il percorso
            $imagePath = $request->file('image')->store('publicimages', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Crea il progetto con i dati validati
        $project = Project::create($validatedData);

        // Associa le tecnologie al progetto, se presenti
        if (isset($validatedData['technologies'])) {
            $project->technologies()->sync($validatedData['technologies']);
        }

        // Reindirizza alla lista progetti con messaggio di successo
        return redirect()->route('admin.projects.index')->with('created', 'Progetto creato con successo!');
    }


    // Mostra la vista per modificare un progetto
    public function edit(Project $project)
    {
        // Recupera tutti i tipi e le tecnologie
        $types = Type::all();
        $technologies = Technology::all();

        return view('edit', compact('project', 'types', 'technologies'));
    }


    // Aggiorna un progetto esistente
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Gestione del caricamento dell'immagine
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            // Carica la nuova immagine 
            $imagePath = $request->file('image')->store('project_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $project->update($validatedData);

        // Aggiorna le technologies
        $project->technologies()->sync($request->technologies);

        // Reindirizza alla lista progetti con messaggio di successo
        return redirect()->route('admin.projects.index')->with('updated', 'Progetto aggiornato con successo!');
    }


    // Elimina un progetto
    public function destroy(Project $project)
    {
        // Elimina l'immagine se presente
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        // Reindirizza alla lista progetti con messaggio di successo
        return redirect()->route('admin.projects.index')->with('deleted', 'Progetto eliminato con successo!');
    }

    // Mostra le info di un progetto
    public function show($id)
    {
        $project = Project::find($id);

        return view('show', compact('project'));
    }
}
