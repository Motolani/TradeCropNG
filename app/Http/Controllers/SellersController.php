<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellersController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('sellers.dashboard');
    }
    
    public function orders()
    {
        # code...
        // $order = Cart::join('transactions', 'transactions.cart_reference', 'carts.request_id')
        //     ->join('crops', 'crops.id', 'carts.product_id')
        //     ->join('users', 'users.id', 'carts.user_id')
        //     ->where('carts.seller_id', '=', Auth::id())
        //     ->select('crats.*', 'transactions.tx_ref', 'transactions.item_count', 'transactions.status as delivery_status', 'users.name as username', 'users.email', 'crops.name as crop_name', 'crops.img')
        //     ->get();
        $orders = Order::join('crops', 'crops.id', 'orders.product_id')
            ->join('transactions', 'transactions.id', 'orders.transaction_id')
            ->join('users', 'users.id', 'orders.buyer_id')
            ->where('orders.seller_id', '=', Auth::id())
            ->where('orders.status', '=', 0)
            ->select('orders.quantity as quantity_ordered', 'transactions.*', 'users.name', 'users.email', 'crops.name as product_name', 'crops.img')
            ->get();
            
            // dd($orders);
            return view('sellers.orders.pending', compact('orders'));
    }
    
    public function ordersHistory()
    {
        # code...
        
        $orders = Order::join('crops', 'crops.id', 'orders.product_id')
            ->join('transactions', 'transactions.id', 'orders.transaction_id')
            ->join('users', 'users.id', 'orders.buyer_id')
            ->where('orders.seller_id', '=', Auth::id())
            ->select('orders.quantity as quantity_ordered', 'orders.status as order_status','transactions.*', 'users.name', 'users.email', 'crops.name as product_name', 'crops.img')
            ->get();
            
            // dd($orders);
            return view('sellers.orders.history', compact('orders'));
    }
}
