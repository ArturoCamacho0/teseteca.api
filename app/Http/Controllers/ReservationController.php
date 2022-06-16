<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::with(['rooms', 'seats', 'function_'])->get();

        return response()->json($reservation, 200);
    }

    public function store(ReservationRequest $request): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::create($request->all());

        $reservation->rooms()->attach($request['room']);
        $reservation_room = $reservation->rooms()->where('id', $request['room'])->first();
        $reservation_room->seats()->attach($request['seats']);

        $reservation->function_()->date()->attach($request['date']);
        $reservation->function_()->hour()->attach($request['hour']);

        return response()->json($reservation, 201);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $reservation = Reservation::with(['rooms', 'seats', 'function_.date', 'function_.hour'])->findOrFail($id);

        return response()->json($reservation, 200);
    }
}
