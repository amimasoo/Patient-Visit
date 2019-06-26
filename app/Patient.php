<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table= 'patients';

    protected $fillable=[
        'id','firstName','lastName','nationalNumber','phoneNumber','height','weight','BMI'
    ];

    public function visits()
    {
        return $this->hasMany('App\Visit', 'patientID');
    }
}
