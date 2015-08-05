<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

    //Primary key
    protected $primaryKey = 'vehicle_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the instructor that owns the vehicle.
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instructor_id', 'instructor_id');
    }
}
