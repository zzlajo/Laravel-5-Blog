<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $zz = [
            'name'           => 'Zlatko Zuber',
            'email'          => 'zuber.zlajo@gmail.com',
            'password'       => '123456',
            'avatar'         => '//www.gravatar.com/avatar/'.md5('zuber.zlajo@gmail.com'),
        ];

        factory(User::class)->create($zz);
        factory(User::class, 9)->create();

    }
}
