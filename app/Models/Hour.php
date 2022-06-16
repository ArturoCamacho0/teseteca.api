<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $fillable = ['hour'];

    public function functions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(FunctionModel::class,
            'functions_dates_hours',
            'hour_id',
            'function_id')
                ->withPivot('date_id');
    }

    public function hours(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Date::class,
            'functions_dates_hours',
            'date_id',
            'hour_id')->withPivot('function_id');
    }
}
