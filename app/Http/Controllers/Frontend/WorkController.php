<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\Repositories\TagsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Criteria\PostType;
use App\Repositories\PostsRepository;
use App\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WorkController extends Controller
{

    /**
     * @var $this |\SebastianBerc\Repositories\Services\CriteriaService
     */
    private $repository;

    /**
     * @var TagsRepository
     */
    private $tag;

    /**
     * WorkController constructor.
     * @param PostsRepository $repository
     */
    public function __construct(PostsRepository $repository, TagsRepository $tag)
    {
        $this->repository = $repository->criteria(new PostType('work'));
        $this->tag = $tag;
//        dd($this->repository->with('tags'));
//        dd(Post::where('type', 'work')->with('tags'));

    }

    /**
     * Display listing of resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $works = $this->repository->with('tags')->all();

        $tags = Tag::with([
            'posts' => function(BelongsToMany $query) {
                $query->where('type', 'work');
            },
        ])->get();

        return view('frontend.pages.works.index', compact('works', 'tags'));
    }

    /**
     * Display listing of specific resource
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $work = $this->repository->with('tags')->findBy('slug', $slug);
        $works = $this->repository->all();

        return view('frontend.pages.works.show', compact('work', 'works'));

    }

    /**
     * Display related tags of specific work
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag($slug)
    {
        $tag = $this->tag->findBy('slug', $slug);
        $posts = $tag->posts()->where('type', 'work')->paginate(5);

        return view('frontend.pages.works.tag', compact('tag', 'posts'));
    }



}
