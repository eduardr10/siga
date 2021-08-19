<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'destination',
        'documentation',
        'date',
        'client_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
