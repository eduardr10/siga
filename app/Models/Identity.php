<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identity_number',
        'avatar_id'
    ];

    public function avatar(){
        return $this->belongsTo(Avatar::class);
    }
    public function emails(){
        return $this->hasMany(Email::class);
    }
    public function phones(){
        return $this->hasMany(Phone::class);
    }
    public function clients(){
        return $this->hasOne(Client::class);
    }
    public function contact(){
        return $this->hasOne(Contact::class);
    }

}
