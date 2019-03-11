<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ActivePerson extends Model
{
    use Notifiable;

    protected $table = 'active_people';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'category', 'type', 'membership_id', 'email',
        'phone', 'address_line_1', 'address_line_2', 'city', 'province',
        'zip_code', 'country'
    ];

    protected $hidden = [
        'team_id','person_id'
    ];

    public function active_person_belongs_to_team()
    {
        return $this->belongsTo('App\Team');
    }

    public function active_person_belongs_to_person()
    {
        return $this->belongsTo('App\Person');
    }
}
