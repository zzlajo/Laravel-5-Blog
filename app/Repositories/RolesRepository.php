<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 17.2.16.
 * Time: 13.26
 */

namespace App\Repositories;

use App\Role;

class RolesRepository extends AbstractRepository
{

    /**
     * Return full qualified model class name
     *
     * @return mixed
     */
    public function takeModel()
    {
        return Role::class;
    }

}