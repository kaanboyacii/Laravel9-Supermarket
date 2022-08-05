<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;

class Product extends Model
{
    use HasFactory;
    #many to one
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function shopcart()
    {
        return $this->hasMany(ShopCart::class);
    }
    public function orderproduct()
    {
        return $this->hasMany(orderproduct::class);
    }
    public function favoriteproduct()
    {
        return $this->hasMany(FavoriteProduct::class);
    }
}
