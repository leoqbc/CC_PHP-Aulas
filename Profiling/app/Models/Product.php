<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function getCategories()
    {
        return Category::where('product_id', $this->id)->get();
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
