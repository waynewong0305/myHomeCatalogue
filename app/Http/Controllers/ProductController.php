<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('deleted', '=', 0)->paginate(4);

        return view('index', compact('products'));
    }

    public function show(Product $products){
        return view('products.show', compact('products'));
    }

    public function search(){
        return view('products.search');
    }

    public function searching($search){

        if(!$search){
            return array('code' => 3, 'message' => 'Search bar cannot be empty.');
        }

        $products = Product::select('id', 'name', 'image')->where('name', 'like', '%'.$search.'%')->get();

        if($products){
            return array('code' => 0, 'message' => 'Result found.');
        }else{
            return array('code' => 1, 'message' => 'No result found.');
        }
    }


    public function result($search){

        $products = Product::select('id', 'name', 'image')->where('name', 'like', '%'.$search.'%')->get();

        return view('products.result', compact('products', 'search'));
    }
}
