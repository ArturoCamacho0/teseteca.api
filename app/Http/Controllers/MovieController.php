<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $movies = Movie::with('category', 'classification')->get();

        return response()->json($movies, 200);
    }

    public function store(MovieRequest $request): \Illuminate\Http\JsonResponse
    {
        $movie = Movie::create($request->validated());

        return response()->json($movie, 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $movie = Movie::with('category', 'classification')->findOrFail($id);

        return response()->json($movie, 200);
    }

    public function update(MovieRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->validated());

        return response()->json($movie, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json(null, 204);
    }
}
