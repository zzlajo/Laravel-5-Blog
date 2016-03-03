<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        DB::table('permissions')->insert([
            'name' => 'create',
            'display_name' => 'Create Post',
            'description' => 'User can create post',
        ]);

        DB::table('permissions')->insert([
            'name' => 'edit',
            'display_name' => 'Edit Post',
            'description' => 'User can edit post',
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete',
            'display_name' => 'Delete Post',
            'description' => 'User can delete post',
        ]);

//
//        $perm = [
//            'name' => 'create',
//            'display_name' => 'Create Post',
//            'description' => 'User can create post',
//        ];
//        factory(Permission::class)->create($perm);
//
//        $perm = [
//            'name' => 'edit',
//            'display_name' => 'Edit Post',
//            'description' => 'User can edit post',
//        ];
//        factory(Permission::class)->create($perm);
//
//        $perm = [
//            'name' => 'delete',
//            'display_name' => 'Delete Post',
//            'description' => 'User can delete post',
//        ];
//        factory(Permission::class)->create($perm);

        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator all site',
        ]);

        DB::table('roles')->insert([
            'name' => 'editor',
            'display_name' => 'Edit posts',
            'description' => 'Edit posts',
        ]);

        DB::table('roles')->insert([
            'name' => 'author',
            'display_name' => 'Author',
            'description' => 'Author',
        ]);

//        $role = [
//            'name' => 'admin',
//            'display_name' => 'Administrator',
//            'description' => 'Administrator all site',
//        ];
//        factory(Permission::class)->create($role);
//
//        $role = [
//            'name' => 'editor',
//            'display_name' => 'Edit posts',
//            'description' => 'Edit posts',
//        ];
//        factory(Permission::class)->create($role);
//
//        $role = [
//            'name' => 'author',
//            'display_name' => 'Author',
//            'description' => 'Author',
//        ];
//        factory(Permission::class)->create($role);

        $role = Role::where('name', 'admin')->first();
        $role = ['0' => 1];
        $perms = Permission::all();

        foreach($perms as $perm) {
            $perm->roles()->sync($role);
        }

        \App\User::with('roles')->find(1)->roles()->sync($role);

//                    isset($request->roles) ? $this->repository->find($id)->roles()->sync($request->roles) : $this->repository->find($id)->roles()->detach();





    }
}
