<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart_list(){
        return view('users.layouts.cart');
    }

    public function index(Request $request){
        $user = Auth::user()->id;
        $products = $request->session()->get('cart'.$user);
        $count = $request->session()->get('count'.$user);
        if ($products == null) {
            $products = [];
            $count = [];
        }
        session(['count'=>$count]);
        session(['cart'=>$products]);
        return redirect()->route('home');
    }

    public function addToCart(Request $request, $id)
    {
        $user = Auth::user()->id;
        $products = $request->session()->get('cart'.$user);
        $count = $request->session()->get('count'.$user);
        $product = Product::findOrFail($id);

        if ($products == null) {
            $products = [];
            array_push($products, $product);
            session(['cart'=>[]]);
            session(['count'=>[]]);
            session()->push('cart', $product);
            session()->push('cart'.$user, $product);
            session()->push('count', 1);
            session()->push('count'.$user, 1);
            return redirect()->back();
        }

        for ($i=0;$i<count($products);$i++){
            if ($products[$i]==$product){
                $count[$i]++;
                session(['count'=>$count]);
                session(['count'.$user=>$count]);
                return redirect()->back();
            }
        }
        array_push($products, $product);
        session()->push('cart', $product);
        session()->push('cart'.$user, $product);
        session()->push('count', 1);
        session()->push('count'.$user, 1);
        return redirect()->back();
    }

    public function remove(Request $request,$id){
        $user = Auth::user()->id;
        $products = $request->session()->get('cart'.$user);
        $count = $request->session()->get('count'.$user);
        array_splice($products,$id,1);
        array_splice($count,$id,1);
        session(['count'.$user=>$count]);
        session(['count'=>$count]);
        session(['cart'.$user=>$products]);
        session(['cart'=>$products]);
        return redirect()->back();
    }
}
