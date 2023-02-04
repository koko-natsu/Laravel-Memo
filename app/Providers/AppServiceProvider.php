<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Memo;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
         
            $memo = new Memo;
            $tag  = new Tag;

            list($memos, $errMsg) = $memo->getMyMemo();
            $tags = $tag->getAllTag();

        $view->with('memos', $memos)
             ->with('tags', $tags);
        });
    }
}
