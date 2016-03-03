<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\RolesRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    /**
     * @var UsersRepository
     */
    private $repository;

    /**
     * @var RolesRepository
     */
    private $rolesRepository;

    public function __construct(UsersRepository $repository, RolesRepository $rolesRepository)
    {
        $this->repository = $repository;
        $this->rolesRepository = $rolesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->with('roles')->all();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userC = $this->repository->find($id);

        return view('backend.users.show', compact('userC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userB = $this->repository->with('roles')->find($id);

        foreach($userB->roles as $role)
        {
            $rolesId[$role->id] = $role->name;
        }

        $roles = $this->rolesRepository->all();

        return view('backend.users.edit', compact('userB', 'roles', 'rolesId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->repository->update($id, $request->except(['_method', '_token']));

        isset($request->roles) ? $this->repository->find($id)->roles()->sync($request->roles) : $this->repository->find($id)->roles()->detach();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.users.index');
    }
}
