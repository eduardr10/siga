<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit',
        'unit_name',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function goals(){
        return $this->hasMany(Goals::class);
    }
}
