<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 7.2.16.
 * Time: 20.42
 */

use Illuminate\Support\Facades\Auth;


if (! function_exists('comments_replay')) {
    /**
     * @param $parentId
     * @return mixed
     */
    function comments_replay($parentId)
    {
        $repository = \App\Comment::where('parent_id', $parentId)->get();
        return $repository;

    }
}


if (! function_exists('isAuthor')){
    /**
     * Check a current user is author
     *
     * @param $id
     * @return bool
     */
    function isAuthor($id)
    {
      return (Auth::id() == $id) ? true : false;
    }
}