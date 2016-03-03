<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 17.2.16.
 * Time: 13.26
 */

namespace App\Repositories;

use App\Permission;

class PermissionsRepository extends AbstractRepository
{
    /**
     * Returned full qualified model class name
     *
     * @return mixed
     */
    public function takeModel()
    {
        return Permission::class;
    }
}