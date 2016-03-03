<?php

namespace App;

//use Aloko\Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;
use Aloko\Elasticquent\ElasticquentTrait;

class Post extends Model
{
    use ElasticquentTrait;

    /**
     * The databases table used by model
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'image', 'author_id', 'category_id', 'type', 'recommend'];


    /**
     * The attributes excluded  from model's JSON form
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The mapping data from databases for elasticsearch
     *
     * @var array
     */
    protected $mappingProperties = array(
        'title' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],
        'content' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],
        'type' => [
            'type' => 'string',
            'analyzer' => 'standard',
        ],
    );


    /**
     * Get the user record associated with the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User');

    }


    /**
     * Get all tags for a given post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the post category associated with the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\PostCategory');
    }


    /**
     * Get all comments for a given post
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }




}
