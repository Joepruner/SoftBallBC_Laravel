<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organization extends Model
{
    Use Notifiable;


    protected $table = 'organizations';

    protected $fillable = [
        'name'
    ];

    public function organization_has_many_districts(){
        return $this->hasMany('App\District');
    }
}
