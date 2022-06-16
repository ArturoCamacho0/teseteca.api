<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'reservation_id',
    ];

    public function reservation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Reservation::class);
    }
}
