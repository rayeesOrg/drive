<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conversations';

    //Primary key
    protected $primaryKey = 'conversation_id';

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
    protected $fillable = ['subject'];

    /**
     * The users that belong to the role.
     * Many-Many Relationship with pivot table.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'participants', 'conversation_id', 'user_id')->withPivot('is_read', 'is_starred')->withTimestamps();
    }

    /**
     * Get the messages for the blog post.
     */
    public function messages()
    {
        return $this->hasMany('App\Message', 'conversation_id', 'conversation_id');
    }
}
