<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = ['location'];

    public function functions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FunctionModel::class);
    }

    public function rooms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'cinemas_rooms');
    }
}
