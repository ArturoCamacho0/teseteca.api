<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionModel extends Model
{
    use HasFactory;

    protected $table = 'functions';

    protected $fillable = ['price', 'movie_id', 'cinema_id'];

    public function reservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function movie(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cinema::class);
    }

    public function dates(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Date::class,
            'functions_dates_hours',
            'function_id',
            'date_id')
                ->withPivot('hour_id');
    }

    public function hours(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Hour::class,
            'functions_dates_hours',
            'function_id',
            'hour_id')
                ->withPivot('date_id');
    }
}
