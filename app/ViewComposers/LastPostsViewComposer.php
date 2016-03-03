<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 3.2.16.
 * Time: 00.01
 */

namespace App\ViewComposers;

use App\Repositories\Criteria\LastFive;
use App\Repositories\Criteria\PostType;
use App\Repositories\PostsRepository;
use Illuminate\View\View;


class LastPostsViewComposer
{

    /**
     * @var PostsRepository
     */
    protected $repository;

    /**
     * LastPostsViewComposer constructor.
     * @param PostsRepository $repository
     */
    public function __construct(PostsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Bind data to view.
     *
     * @param View $view
     * @throws \SebastianBerc\Repositories\Exceptions\InvalidCriteria
     */
    public function compose(View $view)
    {
        $posts = $this->repository->
                criteria(new PostType('blog'))->
                criteria(new LastFive())->
                all();
        $view->with('lastPosts', $posts);
    }
}