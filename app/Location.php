<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

    //Primary key
    protected $primaryKey = 'location_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the availabilities of the instructor.
     */
    public function availabilities()
    {
        return $this->hasMany('App\Availability', 'location_id', 'location_id');
    }
}
