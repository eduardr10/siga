<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity_id',
        'client_id',
    ];

    public function identity(){
        return $this->belongsTo(Identity::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
