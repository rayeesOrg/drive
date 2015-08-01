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
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
