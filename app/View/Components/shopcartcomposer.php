<?php

namespace App\View\Components;

use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopCart;

class shopcartcomposer
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function compose(View $view)
    {
        $data = ShopCart::where('user_id',Auth::id())->get();
        $view->with('shopcart', $data);
    }
}
