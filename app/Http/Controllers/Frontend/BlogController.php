<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\PostWorkRequest;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Criteria\PostType;
use App\Repositories\PostsRepository;
use App\Repositories\TagsRepository;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SavePost;
use PhpSpec\Exception\Fracture\MethodNotFoundException;
use PhpSpec\Exception\Exception;


class BlogController extends Controller
{

    /**
     * @var PostsRepository
     */
    private $post;

    /**
     * @var TagsRepository
     */
    private $tag;

    /**
     * BlogController constructor.
     * @param PostsRepository $post
     * @param TagsRepository $tag
     */
    public function __construct(PostsRepository $post, TagsRepository $tag)
    {
        $this->post = $post->criteria(new PostType('blog'));
        $this->tag = $tag;
    }


    /**
     * Display listing of the resource
     *
*     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->post->with('author')->paginate(5);

        return view('frontend.pages.blog.index', compact('posts'));
    }

    /**
     * Display a specified resource
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {

        $post = $this->post->findBy('slug', $slug);

        if (!isset($post)) {
            return redirect()->route('home');
        }

        $tags = $post->tags;

        return view('frontend.pages.blog.show', compact('post', 'tags'));

    }

    /**
     * Display listing of the resource based on a tag
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag($slug)
    {
        $tag = $this->tag->findBy('slug', $slug);
        $posts = $tag->posts()->where('type', 'blog')->paginate(5);

        return view('frontend.pages.blog.tag', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->post->find($id);

        if((Auth::user()->id == $post->author_id) || Auth::user()->hasRole('admin')) {
            return view('frontend.pages.blog.edit', compact('post'));
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage
     *
     * @param PostWorkRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostWorkRequest $request, $id)
    {

        $this->dispatch(new SavePost($this->post, $request->except(['_token', '_method']), $id));

        return redirect()->route('blog.show', $request->slug);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Dispel the blogs for current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myposts()
    {
        $posts = $this->post->where('author_id', Auth::id())->all();

        return view('frontend.pages.blog.myblogs', compact('posts'));

    }

}
