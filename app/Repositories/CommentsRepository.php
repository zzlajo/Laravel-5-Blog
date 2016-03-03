<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 12.2.16.
 * Time: 21.28
 */

namespace App\Repositories;

use App\Comment;

class CommentsRepository extends AbstractRepository
{

    /**
     * Returned full qualifies model class name
     *
     * @return mixed
     */
    public function takeModel()
    {
        return Comment::class;
    }

}