<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use Notifiable;

    protected $table = 'people';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'membership_id', 'email',
        'phone', 'address_line_1', 'address_line_2', 'city', 'province',
        'zip_code', 'country'
    ];

    public function activeperson(){
        return $this->hasMany('App\ActivePerson');
    }
}
