<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointments';

    //Primary key
    protected $primaryKey = 'appointment_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the learner that owns the appointment.
     */
    public function learner()
    {
        return $this->belongsTo('App\Learner', 'learner_id', 'learner_id');
    }

    /**
     * Get the instructor of the appointment.
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instructor_id', 'instructor_id');
    }
}
