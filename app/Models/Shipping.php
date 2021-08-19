<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'quantity',
        'port_id',
        'contract_id',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function contract(){
        return $this->belongsTo(Contract::class);
    }
}
