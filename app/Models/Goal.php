<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'ending_date',
        'quantity',
        'unit_id',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
