<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 2.2.16.
 * Time: 00.24
 */

namespace App\Repositories;

use App\Tag;

class TagsRepository extends AbstractRepository
{


    /**
     * Returned full qualifies model class name
     *
     * @return mixed
     */
    public function takeModel()
    {
        return Tag::class;
    }

}