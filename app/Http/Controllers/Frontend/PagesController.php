<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\PostCategory;
use App\Repositories\Criteria\LastFive;
use App\Repositories\Criteria\LastPosts;
use App\Repositories\Criteria\PostType;
use App\Repositories\Criteria\BlogRecommend;
use App\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\SendContactEmail;
use App\Repositories\PostsRepository;
use App\Http\Requests\ContactRequest;

class PagesController extends Controller
{

    private $repository;
    private $repositoryC;

    public function __construct(PostsRepository $repository, PostCategoryRepository $repositoryC)
    {
        $this->repository = $repository;
        $this->repositoryC = $repositoryC;
    }

    /**
     * Home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {

        $categories = $this->repositoryC->all();

        $blogsRecomended = $this->repository->criteria(new PostType('blog'))->
                                               criteria(new BlogRecommend(1))->
                                               all();

        $blogLast5 = $this->repository->criteria(new PostType())->
                                        criteria(new LastPosts(3))->
                                        all();

        return view('frontend.pages.home', compact('blogLast5', 'blogsRecomended', 'categories'));
    }

    /**
     * Resume page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resume()
    {
        return view('frontend.pages.resume');
    }

    /**
     * Contact form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Send the contact request
     *
     * @param ContactRequest $request
     * @return mixed
     */
    public function postContact(ContactRequest $request)
    {
        $this->dispatch(new SendContactEmail($request->all()));

        return view('frontend.pages.contact')->withSuccess(trans('app.contact.confirmMailSent'));
    }

}
