<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\AdminController;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->id;

        return view('carts.show', compact('users'));
    }

    public function addToCart($product_id){
        $products = Product::findOrFail($product_id);

        $cart = session()->get('cart', []);

        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
            $cart[$product_id]['subtotal'] = $cart[$product_id]['quantity'] * $cart[$product_id]['price'];
        }else{
            $cart[$product_id] = [
                "name" => $products->name,
                "quantity" => 1,
                "price" => $products->price,
                "image" => $products->image,
                "subtotal" => $products->price
            ];
        }

        session()->put('cart', $cart);

        return array("success" => true, "message"=> "Added to Cart!");
    }

    public function removeFromCart($product_id){

        $cart = session()->get('cart');

        if(isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        session()->flash('success', 'Product successfully deleted.');
        
    }

    public function checkout(){
        $cart = session()->get('cart');

        $checkProfile = auth()->user()->profile->address;

        if(!$checkProfile){
            return array("code" => 2, "message"=> "Please complete your profile.");
        }

        if(isset($cart)){
            $total = 0;

            foreach($cart as $key => $value){
                $orderDetails['product_id'] = $key;
                $orderDetails['product_name'] = $value['name'];
                $orderDetails['product_image'] = $value['image'];
                $orderDetails['product_quantity'] = $value['quantity'];
                $orderDetails['product_price'] = $value['price'];

                $total+= $value['subtotal'];

                $orderList[] = $orderDetails;
                unset($orderDetails);
            }

            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->purchased_product = json_encode($orderList);
            $order->status = "Order Placed";
            $order->total = $total;
            $order->save();

            session()->forget('cart');

            return array("code" => 0, "message"=> "Order placed.");
        }else{
            return array("code" => 1, "message"=> "Shopping cart cannot be empty.");
        }
    }

    public function orderList(){
        $orders = Order::where('user_id', '=', auth()->user()->id)->paginate(5);

        return view('orders.index', compact('orders'));
    }

    public function cancelOrder($orderId){
        $orders = Order::where('user_id', '=', auth()->user()->id)->findOrFail($orderId);

        $orders->status = "Cancelled";
        $orders->save();

        return  array("code" => 0, "message"=> "Order has been cancelled.");
    }

    public function show($orderId){
        if(AdminController::isAdmin()){
            $orders = Order::findOrFail($orderId);
        }else{
            $orders = Order::where('user_id', '=', auth()->user()->id)->findOrFail($orderId);
        }

        return view('orders.show', compact('orders'));
    }
}
