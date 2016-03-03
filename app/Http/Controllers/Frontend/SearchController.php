<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Post;


class SearchController extends Controller
{

    //
    public function index(Request $request)
    {

        Post::addAllToIndex();

        if ($query = $request->input('query', false)) {

            $posts = Post::searchByQuery([
                'filtered' => [
                    'filter' => [
                        'term' => ['type' => 'blog']
                    ],
                    'query' => [
                        'multi_match' => [
                            'query' => $query,
                            'fields' => [ "title^2", "content"]
                        ],
                    ],
                ],
            ]);
        } else {
            $posts = Post::all();
        }

        $findPost = count(json_decode($posts));

        return view('frontend.pages.search', compact('posts', 'findPost'));

    }


}
