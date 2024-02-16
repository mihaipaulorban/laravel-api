<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $projects = Project::query()
            ->when($request->title, function ($q) use ($request) {
                return $q->where('title', 'like', "%{$request->title}%");
            })
            ->when($request->type, function ($q) use ($request) {
                return $q->where('type_slug', $request->type);
            })
            ->when($request->technologies, function ($q) use ($request) {
                return $q->whereHas('technologies', function ($q) use ($request) {
                    $q->whereIn('slug', $request->technologies);
                });
            })
            ->get();

        return $projects;
    }
}
