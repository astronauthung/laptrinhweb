<?php

namespace App\Http\Controllers;

use App\Models\cart;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\product;

class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $products = product::paginate(6);

            return view('home.userpage', compact('products'));
        }
        

    }

    public function index(){

        $products = product::paginate(6);

        return view('home.userpage', compact('products'));
    }


    public function product_detail($id){

        $product=product::find($id);

        return view('home.product_detail', compact('product'));
    }

    //add tocart function
    public function add_cart(Request $request, $id){

        if(Auth::id()){

            $cart = new cart();

            $product = product::find($id);
            $user = Auth::user();
            

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;

            if ($product->discount_price != null) {
                $cart->price=$product->discount_price * $request->quantity;
            }else{
                $cart->price=$product->price * $request->quantity;
            }

            $cart->image=$product->image;
            $cart->product_id=$product->id;

            $cart->quantity=$request->quantity;


            $cart->save();

            return redirect()->back();

        }else{

            return redirect('login');
        }

    }

    
    //view cart
    public function view_cart(){

        if(Auth::id()){

            $id = Auth::user()->id;

            $datas = cart::where('user_id', '=', $id)->get();

            $counter = cart::where('user_id', '=', $id)->count();

            return view('home.view_cart', compact('datas', 'counter'));

        }else{

            return redirect('login');
        }
    }


    // remove from cart
    public function remove_cart($id){

        $cart = cart::find($id);

        $cart->delete();

        return redirect('view_cart')->with('message', 'Cart was removed successfully');
    }
}
