<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\User;

use App\Models\Order;


class AdminController extends Controller
{
    //
    public function view_category()
    {
        $data = category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message','Category added Successfully');

    }

    public function delete_category($id)
    {
        $data = category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category deleted Successfully');

    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $req)
    {
        $data = new product;

        $data->title = $req->title;

        $data->author = $req->author;

        $data->description = $req->description;
        $data->quantity = $req->quantity;
        $data->category = $req->category;
        $data->duration = $req->duration;

        $image = $req->image;

        $imagename= time().'.'.$image->getClientOriginalExtension();
        $req->image->move('product',$imagename);

        $data->image = $imagename;


        $data->save();

        return redirect()->back()->with('message','Product added Successfully');

    }

    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $data = product::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category deleted Successfully');

    }

    public function update_product($id)
    {
        $product = product::find($id);

        $category = category::all();

        return view('admin.update_product',compact('product','category'));
    }

    public function update_product_confirm(Request $req, $id)
    {
        $product = product::find($id);

        $product->title = $req->title;

        $product->author = $req->author;

        $product->description = $req->description;
        $product->quantity = $req->quantity;
        $product->category = $req->category;
        $product->duration = $req->duration;

        $image = $req->image;

        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $req->image->move('product',$imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message','Product updated Successfully');
    }

    public function view_users()
    {
        $user = user::where('usertype','=','0')->get();
        return view('admin.view_users',compact('user'));
    }

    public function delete_user($id)
    {
        $data = user::find($id);

        $data->delete();

        return redirect()->back()->with('message','User deleted Successfully');

    }

    public function view_orders()
    {
        $order = order::all();
        return view('admin.view_orders',compact('order'));
    }

    public function start_delivery($id)
    {
        $data = order::find($id);
        if($data->delivery_status=="processing" && $data->payment_status=="PAID")
        {
            $data->delivery_status="On Route";
            $data->save();
            return redirect()->back()->with('message','Sent to delivery');
        }
        else
        {
            return redirect()->back()->with('message','Payment not cleared, cannot start delivery');
        }
        
    }

    public function remove_delivery($id)
    {
        $data = order::find($id);
        $data->delete();
        return redirect()->back()->with('message','Order Removed');

        
    }
}
