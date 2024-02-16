<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function show($technologySlug)
    {

        $technology = Technology::where('slug', $technologySlug)->firstOrFail();

        return response()->json($technology);
    }

    public function index(Request $request)
    {

        $technologies = Technology::query()
            ->when($request->name, function ($q) use ($request) {
                return $q->where('name', 'like', "%{$request->name}%");
            })
            ->get();

        return response()->json($technologies);
    }
}
