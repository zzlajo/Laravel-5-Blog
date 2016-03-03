<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePostCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique;
            $table->timestamps();
        });

        DB::table('post_category')->insert([
            'name' => 'Mans',
        ]);
        DB::table('post_category')->insert([
            'name' => 'Women',
        ]);
        DB::table('post_category')->insert([
            'name' => 'Sport',
        ]);
        DB::table('post_category')->insert([
            'name' => 'Books',
        ]);
        DB::table('post_category')->insert([
            'name' => 'IT',
        ]);
        DB::table('post_category')->insert([
            'name' => 'Cars',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_category');
    }
}
