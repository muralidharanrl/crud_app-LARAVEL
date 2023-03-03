<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //use HasFactory;
    protected $table = 'contacts';
    protected $primarykey = 'id';
    protected $guarded = [];

    function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
