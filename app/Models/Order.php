<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'contract_id',
        'quality_id',
        'unit_id',
        'cocoa_id',
    ];

    public function cocoa(){
        return $this->belongsTo(Cocoa::class);
    }
    public function quality(){
        return $this->belongsTo(Quality::class);
    }
    public function contract(){
        return $this->belongsTo(Contract::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
