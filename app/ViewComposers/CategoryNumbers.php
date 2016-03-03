<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 9.2.16.
 * Time: 22.58
 */

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\PostCategoryRepository;
use App\PostCategory;

class CategoryNumbers
{
    /**
     * @var PostCategoryRepository
     */
    private $repository;

    /**
     * CategoryNumbers constructor.
     * @param PostCategoryRepository $repository
     */
    public function __construct(PostCategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $categories = $this->repository->all();

        $view->with('categories', $categories);
    }

}