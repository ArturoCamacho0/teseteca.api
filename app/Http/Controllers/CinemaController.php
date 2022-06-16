<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        return Cinema::all();
    }

    public function store(Request $request)
    {
        $cinema = Cinema::create($request->only('location'));
        return response()->json($cinema, 201);
    }
}
