<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function admit()
    {
        return $this->hasMany('App\Admitted');
    }

    public function diagnosis()
    {
        return $this->hasMany('App\Diagnosis');
    }

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }
}
