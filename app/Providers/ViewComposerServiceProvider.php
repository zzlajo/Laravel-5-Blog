<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['frontend.partials.common.footer._lastPosts', 'frontend.partials.blog.blocks.lastPosts'], 'App\ViewComposers\LastPostsViewComposer');

        view()->composer(['backend.*', 'frontend.*'], 'App\ViewComposers\LoggedInUserViewComposer');

        view()->composer('frontend.*', 'App\ViewComposers\CategoryNumbers');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
