<?php

use App\Tag;
use App\Post;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        factory(Tag::class, 10)->create();

        $posts = Post::all();

        foreach ($posts as $post) {
            $tags = Tag::orderByRaw('RAND()')->take(rand(1, 5))->get(['id']);
            $post->tags()->sync($tags);
        }

    }
}
