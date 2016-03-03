<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\SaveRole;
use App\Jobs\SavePermissionsRole;
use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\RolesRepository;
use App\Repositories\PermissionsRepository;
use App\Http\Requests\RoleRequest;

class RolesController extends Controller
{
    /**
     * @var RolesRepository
     */
    private $repository;

    /**
     * @var PermissionsRepository
     */
    private $repositoryPermission;

    public function __construct(RolesRepository $repository, PermissionsRepository $permissionsRepository)
    {
        $this->repository = $repository;
        $this->repositoryPermission = $permissionsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = $this->repository->with('perms')->all();

        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->dispatch(new SaveRole($this->repository, $request->all()));
        return redirect()->route('admin.roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->repository->with('perms')->find($id);

        foreach($role->perms as $perm) {
            $permIds[$perm->id] = $perm->name;
        }

        $permissions = $this->repositoryPermission->all();

        return view('backend.roles.edit', compact('role', 'permissions', 'permIds'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->dispatch(new SaveRole($this->repository, $request->except(['_method', '_token','permissions']), $id));

        $this->dispatch(new SavePermissionsRole($this->repository, $this->repositoryPermission, $id, $request->permissions));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Delete role is little complicate";
    }
}
