<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instructors';

    //Primary key
    protected $primaryKey = 'instructor_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the user record of the instructor.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * Get the appointments of the instructor.
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment', 'instructor_id', 'instructor_id');
    }

    /**
     * Get the vehicle of the instructor.
     */
    public function vehicle()
    {
        return $this->hasOne('App\Vehicle', 'instructor_id', 'instructor_id');
    }

    /**
     * Get the company record of the instructor.
     */
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'company_id');
    }

    /**
     * Get the availabilities of the instructor.
     */
    public function availabilities()
    {
        return $this->hasMany('App\Availability', 'instructor_id', 'instructor_id');
    }
}
