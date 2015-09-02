<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    //Primary key
    protected $primaryKey = 'image_id';

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
    protected $fillable = ['instructor_id', 'name'];

    /**
     * Get the company record of the instructor.
     */
    public function instructor()
    {
        return $this->belongsTo('App\Instructor', 'instructor_id', 'instructor_id');
    }
}
