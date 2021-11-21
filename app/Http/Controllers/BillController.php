<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Bill;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class BillController extends Controller
{
    public function viewProductBuy()
    {
        $bills = Bill::paginate(5);
        return view('admin.manage_user.bills', compact('bills'));
    }

    public function addBill(CheckoutRequest $request)
    {
        $products = session('cart');
        $counts = session('count');
        $total = 0;
        $bill = new Bill();
        $bill->user_name = $request->input('user_name');
        $bill->phone_number = $request->input('phone_number');
        $bill->email = $request->input('email');
        $bill->address = $request->input('address');
        foreach ($products as $key => $product) {
            $total += $counts[$key] * $product->price;
            $bill->product_name = $product->name;
            $bill->product_quantity = count($products);
            $bill->total_price = $total;
        }
        $bill->save();
        return redirect()->route('home');
    }

    public function deleteBill($id)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $bill = Bill::findOrFail($id);
        $bill->delete();
        return redirect()->route('admin.list_bills');
    }

}
