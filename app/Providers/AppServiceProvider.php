<?php

namespace App\Providers;

use App\Models\wn_category;
use App\Models\wn_post;
use App\Models\wn_sub_category;
use App\Models\wn_web_setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        view()->composer("layout.layout", function ($view) {
            $category = wn_category::all()->where("status", "ACTIVE");
            $subCat = wn_sub_category::where("status", "ACTIVE")->get()->groupBy("category_uid");
            $catFirstSubCat = [];
            foreach ($subCat as $sc) {
                $catFirstSubCat[] = head(head($sc));
            }

            // dd($catFirstSubCat);


            $catFirstPost = [];
            foreach ($catFirstSubCat as $cfsc) {
                $catFirstPost[] = wn_post::where("status", "PUBLIC")->where("sub_category_uid", $cfsc->uuid)->first();
            }

            $view->with(["settings" => wn_web_setting::all(), "navs" => $category, "firstSubCat" => $catFirstSubCat, "firstPost" => $catFirstPost]);
        });
    }
}
