<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Criteria\PostType;
use App\Repositories\PostsRepository;
use App\Repositories\CommentsRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class CommentsController extends Controller
{
    /**
     * @var $this |\SebastianBerc\Repositories\Services\CriteriaService
     */
    private $post;

    /**
     * @var CommentsRepository
     */
    private $comment;

    public function __construct(PostsRepository $post, CommentsRepository $comment)
    {
        $this->post = $post->criteria(new PostType());
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $this->post->find($request->blogId);
        $this->comment->model->title = $request->title;
        $this->comment->model->body = $request->body;
        $this->comment->model->parent_id = $request->parent_id;
        $this->comment->model->user_id = Auth::id();
        $post->comments()->save($this->comment->model);

        return Redirect::back();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
