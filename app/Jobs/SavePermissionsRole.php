<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 20.2.16.
 * Time: 01.16
 */

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Repositories\PermissionsRepository;
use App\Repositories\RolesRepository;


class SavePermissionsRole extends Job implements SelfHandling
{
    /**
     * @var PermissionsRepository
     */
    private $permission;

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    private $role;

    /**
     * @var
     */
    private $data;

    /**
     * SavePermissionsRole constructor.
     * @param RolesRepository $role
     * @param PermissionsRepository $permission
     * @param $roleId
     * @param $data
     */
    public function __construct(RolesRepository $role, PermissionsRepository $permission, $roleId, $data)
    {
        $this->role = $role->find($roleId);
        $this->permission = $permission;
        $this->data = $data;
    }

    /**
     * Execute the job
     *
     */
    public function handle()
    {
        if(count($this->data)) {
            $this->role->perms()->sync($this->data);
        } else {
            $this->role->perms()->detach();
        }

    }

}