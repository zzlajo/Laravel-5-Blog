<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'post_category';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all posts for given category
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id', 'id')->where('type', 'blog');
    }

    /**
     * Return count posts by category
     *
     * @return mixed
     */
    public function postsCount()
    {
        return $this->posts()
            ->selectRaw('title, category_id, count(*) as aggregate')
            ->groupBy('category_id');
    }

    /**
     * Get all posts for given category
     *
     * @return mixed
     */
    public function works()
    {
        return $this->hasMany('App\Post', 'category_id', 'id')->where('type', 'work');
    }

    /**
     * Return work count by category
     *
     * @return mixed
     */
    public function worksCount()
    {
        return $this->works()
                    ->selectRaw('title, category_id, count(*) as aggregate')
                    ->groupBy('category_id');
    }

}
