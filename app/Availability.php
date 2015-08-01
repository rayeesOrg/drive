<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'availabilities';

    //Primary key
    protected $primaryKey = 'availability_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the instructor that owns the availability.
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instructor_id', 'instructor_id');
    }

    /**
     * Get the instructor that owns the availability.
     */
    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id', 'location_id');
    }
}
