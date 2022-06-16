<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;

class UserController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request['email'])->first();
        if ($user && \Hash::check($request['password'], $user->password)) {
            $token = $user->createToken('teseteca')->accessToken;

            Passport::tokensExpireIn(now()->addDays(5));

            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function register(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::create($request->validated());

        $user->password = bcrypt($user->password);
        $user->save();

        return response()->json($user, 201);
    }

    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }

    public function store(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $request->merge(['password' => bcrypt($request['password'])]);
        $request->merge(['role' => 1]);
        $user = User::create($request->validated());

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(UserRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());

        return response()->json($user, 200);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        User::destroy($id);

        return response()->json(null, 204);
    }
}
