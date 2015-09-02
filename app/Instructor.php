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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'company_id', 'vehicle_id', 'title', 'first_name', 'last_name', 'dob', 'address', 'town', 'county', 'postcode', 'mob_no', 'tel_no', 'all_locations'];

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
        return $this->hasMany('App\Vehicle', 'instructor_id', 'instructor_id');
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

    /**
     * Get the reviews of the instructor.
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'instructor_id', 'instructor_id');
    }

    /**
     * Get the images of the instructor.
     */
    public function images()
    {
        return $this->hasMany('App\Image', 'instructor_id', 'instructor_id');
    }
}
