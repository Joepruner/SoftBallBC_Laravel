<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    Use Notifiable;

    Protected $table = 'clubs';

    /**
     * @var array
     *
     */
    protected $fillable = [
        'name', 'district', 'description', 'contact_first_name', 'contact_last_name',
        'email', 'phone', 'address_line_1',
        'address_line_2', 'city', 'province', 'zip_code', 'country', 'website',
        'year_established'
    ];

    public function clubs_has_many_teams(){
        return $this->hasMany('App\Team');
    }

    public function club_belongs_to_district(){
        return $this->belongsTo('App\District');
    }
}
