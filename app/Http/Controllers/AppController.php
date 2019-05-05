<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Role;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use Gate;
use App\Order;

class AppController extends Controller
{
    public function getIndex()
    {
        return view('shop.main');
    }
    public function getAuthorCreate()
    {
        return view('author.create');
    }
    public function postAuthorCreate(Request $request)
    {
        $filepath = null;
        if (Input::hasFile('imagePath')){
            try{
                $file =Input::file('imagePath');
                $file->move('uploads', $file->getClientOriginalName());
                $filepath = 'uploads/'.$file->getClientOriginalName();
            }catch(Exception $ex){
                $filepath = null;
            }
        }

        $this->validate($request, [
            'title' => 'required|min:2',
            'info' => 'required|min:2',
            
        ]);
        $user = Auth::user();
        $product = new Product();
        $product->user_id = $user->id;
        $product->title = $request->input('title');
        $product->info = $request->input('info');
        $product->price = $request->input('price');
        $product->imagePath = $filepath;
        $product->save();
        return redirect()->route('product.main');
    }


    public function getAuthorPage()
    {
        $products = new Product();
        $products = $products->where('user_id', '=', Auth::user()->id)->get();


        return view('author', [
            'products' => $products,
        ]);
    }
    public function getAdminPage()
    {
        $users = User::all();
        $orders = Order::all();
        
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        
        return view('admin', [
            'users' => $users,
            'orders' => $orders,
        ]);
    }

    public function getGenerateArticle()
    {
        return response('Article generated!', 200);
    }
    
    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_author']) {
            $user->roles()->attach(Role::where('name', 'Author')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return redirect()->back();
    }

    public function deleteProduct($id){
        $delete = Product::find($id);
        $delete->delete();
        return redirect()->back();
    }

}