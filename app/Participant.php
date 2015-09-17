<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'participants';

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
    protected $fillable = ['is_read', 'is_starred'];

    public function conversation()
	{
		return $this->belongsTo('App\Conversation', 'conversation_id', 'conversation_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}
}
