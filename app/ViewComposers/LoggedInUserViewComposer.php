<?php
/**
 * Created by PhpStorm.
 * User: zlatko
 * Date: 3.2.16.
 * Time: 00.14
 */

namespace App\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;


class LoggedInUserViewComposer
{

    /**
     * Bind data to view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = Cache::remember('user', 1, function() {
            return Auth::user();
        });
//        $user = Auth::user();
        $view->with('user', $user);
    }

}