<?php

namespace App\Http\Controllers;

use App\Http\Requests\FunctionRequest;
use App\Models\FunctionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FunctionsController extends Controller
{
    public function index(): \Illuminate\Support\Collection
    {
        return FunctionModel::with(['hours', 'cinema', 'movie'])->get();
    }

    public function store(FunctionRequest $request): \Illuminate\Http\JsonResponse
    {
        $function = FunctionModel::create($request->validated());

        foreach ($request['dates'] as $date) {
            $function->dates()->create([
                'date' => $date['date']
            ]);

            foreach ($date['hours'] as $hour) {
                $function->dates->last()->hours()->create([
                    'hour' => $hour
                ]);
            }
        }

        DB::update('UPDATE functions_dates_hours SET function_id = ? WHERE function_id IS NULL', [$function->id]);
        DB::delete('DELETE FROM functions_dates_hours WHERE hour_id IS NULL');

        return response()->json($function, 201);
    }

    public function show($id): \Illuminate\Database\Eloquent\Collection|array
    {
        return FunctionModel::with(['hours', 'cinema', 'movie'])->get();
    }

    public function update(FunctionRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $function = FunctionModel::findOrFail($id);
        $function->update($request->validated());

        foreach ($request['dates'] as $date) {
            $function->dates()->updateOrCreate([
                'date' => $date['date']
            ]);

            foreach ($date['hours'] as $hour) {
                $function->dates->last()->hours()->updateOrCreate([
                    'hour' => $hour
                ]);
            }
        }

        return response()->json($function, 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $function = FunctionModel::findOrFail($id);
        $function->delete();

        return response()->json(null, 204);
    }
}
