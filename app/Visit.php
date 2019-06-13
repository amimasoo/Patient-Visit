<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

    protected $fillable = [
        'id','date','patientID'
    ];

    public function patients()
    {
       return $this->belongsTo('App\Patient','patientID');
    }
}
