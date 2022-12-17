<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

class HomeController extends Controller
{
    // new
    public function index()
    {
        $product = product::paginate(9);
        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
            $product = product::paginate(9);
            return view('home.userpage',compact('product'));
        }

    }

    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $req, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            
            $product = product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;

            $cart->product_title = $product->title;
            $cart->quantity = $product->quantity;
            $cart->duration = $product->duration;
            $cart->image = $product->image;

            $cart->product_id = $product->id;

            $cart->user_id = $user->id;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function delete_cart($id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message','Book removed from Cart');
    }

}
