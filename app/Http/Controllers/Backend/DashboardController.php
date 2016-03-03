<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Criteria\PostType;
use App\Repositories\PostsRepository;
use App\Repositories\UsersRepository;
use App\Post;

class DashboardController extends Controller
{
    /**
     * @var PostsRepository
     */
    private $post;


    /**
     * @var UsersRepository
     */
    private $user;

    public function __construct(PostsRepository $post, UsersRepository $user)
    {
        $this->post = $post;
        $this->user = $user;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPostsCount = $this->post->criteria(new PostType('blog'))->count();

        $workPostsCount = Post::where('type', 'work')->count();

        $usersCount = $this->user->count();

        return view('backend.dashboard.index', compact('blogPostsCount', 'workPostsCount', 'usersCount'));

    }

}
