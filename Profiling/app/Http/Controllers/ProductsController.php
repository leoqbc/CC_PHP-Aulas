<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        // $products = Product::lazy();

        // sleep(5);

        // $products = Product::query()
        //     ->leftJoin('categories', 'products.id', '=', 'categories.product_id')
        //     ->select(
        //         'products.*', 
        //         DB::raw("group_concat(' ', categories.nome) as categories_list")
        //     )->groupBy('products.id')
        // ->lazy();

        return view('products', compact('products'));
    }
}
