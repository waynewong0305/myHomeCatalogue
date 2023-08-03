<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Profile;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function isAdmin(){
        $checkRole = auth()->user()->role;

        return $checkRole == 'admin' ? true: false;
    }

    public function productList(){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $products = Product::paginate(5);

        return view('admins.productList', compact('products'));
    }

    public function createNewProduct(){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        return view('admins.newProduct');
    }

    public function storeNewProduct(){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => ['required', 'integer'],
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads','public');

        $products = new Product;
        $products->name = $data['name'];
        $products->description = $data['description'];
        $products->price = $data['price'];
        $products->image = '/storage/'.$imagePath;
        $products->save();

        return redirect('admin/productList');
    }

    public function editProduct($products){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $products = Product::findOrFail($products);

        return view('admins.editProduct', compact('products'));
    }

    public function updateProduct($products){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $products = Product::findOrFail($products);

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => ['required', 'integer'],
            'image' => 'image',
            'deleted' => 'required'
        ]);

        if(request('image')){
            $imagePath = request('image')->store('uploads','public');

            $products->update(array_merge($data, ['image' => '/storage/'.$imagePath]));
        }else{

            $products->update($data);
        }

        return redirect('admin/productList');
    }

    public function orderList(){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $orders = Order::paginate(5);

        return view('admins.orderList', compact('orders'));
    }

    public function orderUpdate($orders){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $orders = Order::findOrFail($orders);

        return view('admins.orderUpdates', compact('orders'));
    }

    public function storeOrderUpdate($orders){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $orders = Order::findOrFail($orders);

        $data = request()->validate([
            'status' => 'required',
        ]);

        $orders->update($data);
        $orders->save();

        return  redirect('admin/orderList');;
    }

    public function userList(){
        if(!$this->isAdmin()){
            return redirect('/home');
        }

        $users = User::join('profiles', 'users.id', '=', 'profiles.user_id')->where('users.role', '=', 'user')->select('users.id', 'users.name', 'profiles.image')->paginate(5);

        return view('admins.userList', compact('users'));
    }
}
