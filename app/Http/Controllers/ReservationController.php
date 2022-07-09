<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\FunctionModel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::with(['function_.hour'])->get();

        return response()->json($reservation, 200);
    }

    public function store(ReservationRequest $request): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::create($request->all());

        return response()->json($reservation, 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::with(['function_.hour'])->findOrFail($id);

        return response()->json($reservation, 200);
    }

    public function getByUser($id_user) {
        $reservations = Reservation::where('user_id', $id_user)->get();

        return response()->json([$reservations], 200);
    }
}
