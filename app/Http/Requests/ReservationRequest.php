<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'function_id' => 'required|integer|exists:functions,id',
            'user_id' => 'required|integer|exists:users,id',
            'room' => 'required|integer|exists:rooms,id',
            'seats' => 'required|array|exists:seats,id',
            'date' => 'required|integer|exists:dates,id',
            'hour' => 'required|integer|exists:hours,id',
        ];
    }
}