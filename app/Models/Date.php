<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function functions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(FunctionModel::class, 'functions_dates_hours', 'date_id', 'function_id')
            ->withPivot('hour_id');
    }

    public function hours(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Hour::class,
            'functions_dates_hours',
            'date_id',
            'hour_id')
                ->withPivot('function_id');
    }
}
