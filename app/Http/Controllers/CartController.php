<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\User;
use App\DatabaseStorage;
use DB;
use App\DatabaseStorageModel;
use App\Http\Controllers\Cart_storage;


class CartController extends Controller
{
    public function listCart(){
      
$cart=\Cart::session(auth()->user()->id)->getContent();
dd($cart);
        $cart_storage=Cart_storage::get();
        return view('home.cartlist', compact('cart_storage'));

    }

    public function addCart(Request $request){
     //dd($request);
     
        $products=Product::where('id', $request->id)->first();
        
        \Cart::session(Auth::user()->id)->add(array(
            'id' => $products->id,
            'name' => $products->name,
            'price' => $products->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $products
        ));

        return redirect('home');
    }
}
