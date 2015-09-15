<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    //Primary key
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'role', 'active', 'code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the learner record associated with the user.
     */
    public function learner()
    {
        return $this->hasOne('App\Learner', 'user_id', 'user_id');
    }

    /**
     * Get the instructor record associated with the user.
     */
    public function instructor()
    {
        return $this->hasOne('App\Instructor', 'user_id', 'user_id');
    }

    /**
     * The conversations that belong to the user.
     * Many-Many Relationship with pivot table.
     */
    public function conversations()
    {
        return $this->belongsToMany('App\Conversation', 'participants', 'user_id', 'conversation_id')->withPivot('is_read', 'is_starred')->withTimestamps();
    }
}
