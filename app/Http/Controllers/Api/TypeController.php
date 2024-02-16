<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function show($typeSlug)
    {

        $type = Type::where('slug', $typeSlug)->firstOrFail();

        return response()->json($type);
    }

    public function index(Request $request)
    {

        $types = Type::query()
            ->when($request->name, function ($q) use ($request) {
                return $q->where('name', 'like', "%{$request->name}%");
            })
            ->get();

        return response()->json($types);
    }
}
