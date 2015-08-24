<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'learners';

    //Primary key
    protected $primaryKey = 'learner_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'first_name', 'last_name', 'dob', 'address', 'town', 'county', 'postcode', 'mob_no', 'tel_no'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the user record of the learner.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * Get the appointments of the learner.
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment', 'learner_id', 'learner_id');
    }

    /**
     * Get the reviews written by the learner.
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'learner_id', 'learner_id');
    }
}
