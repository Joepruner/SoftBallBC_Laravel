<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class District extends Model
{
    Use Notifiable;

    protected $table = 'districts';

    /**
     * @var array
     */

    protected $fillable =[
        'name','number'
    ];

    public function district_belongs_to_organization(){
        return $this->belongsTo('App\Organization');
    }

    public function district_has_many_clubs(){
        return $this->hasMany('App\Club');
    }
}
