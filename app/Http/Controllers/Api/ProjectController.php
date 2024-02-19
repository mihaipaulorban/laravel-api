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
            ->paginate(3);

        return $projects;
    }
}
