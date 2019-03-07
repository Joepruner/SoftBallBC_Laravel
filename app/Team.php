<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    Use Notifiable;

    Protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    Protected $fillable =[
        'name','season','registered'
    ];

    public function activeperson(){
        return $this->hasMany('App\ActivePerson');
    }
}
