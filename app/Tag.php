<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The databases name used by model
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'content'];

    /**
     * The attributes excluded from JSON form
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Get all posts for a given tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

}
