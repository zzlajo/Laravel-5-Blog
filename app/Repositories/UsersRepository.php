<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 2.2.16.
 * Time: 00.25
 */

namespace App\Repositories;

use App\User;


class UsersRepository extends AbstractRepository
{


    /**
     * Returned full qualifies model class name
     *
     * @return mixed
     */
    public function takeModel()
    {
        return User::class;
    }

}