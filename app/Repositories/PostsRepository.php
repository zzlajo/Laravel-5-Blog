<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 2.2.16.
 * Time: 00.22
 */

namespace App\Repositories;

use App\Post;


class PostsRepository extends AbstractRepository
{

    /**
     * Returned full qualified model class name
     *
     * @return string
     */
    public function takeModel()
    {
        return Post::class;
    }

}