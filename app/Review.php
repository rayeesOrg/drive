<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * Primary key
     */
    protected $primaryKey = 'review_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['learner_id', 'instructor_id', 'rating', 'review'];

    /**
     * Get the learner that wrote the review.
     */
    public function learner()
    {
        return $this->belongsTo('App\Learner', 'learner_id', 'learner_id');
    }

    /**
     * Get the instructor of the review.
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instructor_id', 'instructor_id');
    }
}
