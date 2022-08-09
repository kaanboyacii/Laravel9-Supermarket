<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopCart;
use App\Models\Setting;
use App\Http\View\Composer\shopcartcomposer;
use App\Models\Comment;
use App\Models\FavoriteProduct;
use App\Models\Message;
use App\Models\OrderProduct;
use Illuminate\Pagination\Paginator;

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
        // Use following code if you prefer to create a class
        // Based view composer otherwise use callback
        View::composer('post.list', PostComposer::class);


        // Use following code if you want to use callback
        // Based view composer instead of class based view composer
        View::composer('*', function ($view) {

            // following code will create $posts variable which we can use
            // in our post.list view you can also create more variables if needed
            $shopcarttotal = ShopCart::where('user_id', Auth::id())->get();
            $view->with('shopcarttotal',  $shopcarttotal);
            $setting = Setting::first();
            $view->with('setting',  $setting);
            $newmessages = Message::where('status', 'Yeni')->get();
            $view->with('newmessages',  $newmessages);
            $newcomments = Comment::where('status', 'Yeni')->get();
            $view->with('newcomments',  $newcomments);
            $favproducts = FavoriteProduct::where('user_id', '=', Auth::id())->get();
            $view->with('favproducts',  $favproducts);
            $orderproducts = OrderProduct::where('user_id', '=', Auth::id())->get();
            $view->with('orderproducts',  $orderproducts);
        });
    }
}
