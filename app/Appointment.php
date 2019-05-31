<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'staff_id');
    }
}
