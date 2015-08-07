<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    //Primary key
    protected $primaryKey = 'company_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the instructors of the company.
     */
    public function instructors()
    {
        return $this->hasMany('App\Instructor', 'company_id', 'company_id');
    }
}
