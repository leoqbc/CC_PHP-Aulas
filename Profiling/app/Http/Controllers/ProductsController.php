<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        // $products = Product::query()
        //     ->leftJoin('categories', 'products.id', '=', 'categories.product_id')
        //     ->select(DB::raw('products.id, products.nome, products.descricao, count(categories.product_id) as totalCategory'))
        //     ->groupBy('products.id','products.nome', 'products.descricao', 'categories.product_id')
        //     ->orderBy('categories.product_id', 'desc')
        // ->paginate(20);
        sleep(5);
        $products = Product::paginate(30);

        return view('products', compact('products'));
    }
}
