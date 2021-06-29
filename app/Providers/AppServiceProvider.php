<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SkillsCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
     *
     * @return void
     */
    public function boot()
    {
        View::composer(["admin.sub_categories.list"], function($view) {
            $view->with("sub_categ_all",(new Category())->getData()->pluck("title","id"));
        });

        View::composer(["admin.skills.list"], function($view) {
            $view->with("skills_categ_all",(new SkillsCategory())->getData()->pluck("name","id"));
        });

    }
}
