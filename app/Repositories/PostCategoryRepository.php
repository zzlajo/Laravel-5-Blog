<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 8.2.16.
 * Time: 20.17
 */

namespace App\Repositories;

use App\PostCategory;

class PostCategoryRepository extends AbstractRepository

{
    /**
     * Returned full qualified model class name
     *
     * @return mixed
     */
    public function takeModel()
    {
        return PostCategory::class;
    }

}