<?php

namespace App\Providers;

use App\Models\ModelHasRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\City;
use App\Models\Region;
use App\Models\Country;
use App\Models\Category;

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
        Paginator::useBootstrap();

        if(\Schema::hasTable('cities')) {
            $cities = City::limit(20)->get();
            View::share('cities', $cities);
        }

//        if(\Schema::hasTable('categories')) {
            $categories = Category::where('type', 'products')->where('parent_id', NULL)->get();
            View::share('categories', $categories);
//        }

//        Relation::enforceMorphMap([
//            'City' => City::class,
//            'Region' => Region::class,
//            'Country' => Country::class,
//        ]);
    }
}
