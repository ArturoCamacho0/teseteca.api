<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'status',
        'function_id',
        'user_id',
    ];

    public function sale(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Sale::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function function_(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FunctionModel::class);
    }

    public function rooms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Room::class,
            'reservations_rooms_seats',
            'reservation_id',
            'room_id')
                ->withPivot('seat_id');
    }

    public function seats(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Seat::class,
            'reservations_rooms_seats',
            'reservation_id',
            'seat_id')
                ->withPivot('room_id');
    }
}
