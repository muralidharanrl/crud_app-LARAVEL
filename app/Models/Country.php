<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $primarykey = 'id';

    protected $guarded = [];

    function contacts(){
        return $this->hasMany(Contact::class);
    }

    function states(){
        return $this->hasMany(State::class);
    }
}
