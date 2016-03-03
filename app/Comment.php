<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];


    /**
     * Get all comments for relate a model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user record associated with the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get tha post record associated with the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }


}
