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
}
