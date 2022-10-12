<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Crop;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = Cart::join('crops', 'crops.id', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->where('carts.status', 0)
            ->select('carts.*', 'crops.img', 'crops.price_per', 'crops.price', 'crops.quantity as max_quantity')
            ->get();
            
            $sum = Cart::where('carts.user_id', Auth::id())
            ->where('carts.status', 0)->sum('price_quantity');
            // dd($sum);
            
            return view('cart', compact('cart', 'sum'));
    }
    
    public function addToCart(Request $request)
    {
        # code...
        Log::info($request);
        $requestId = time().rand();
        
        $cart = Cart::where('user_id', Auth::id())->where('status', 0);
        
        $produce = Crop::where('id', $request->product_id)->first();
        $sellerId = $produce->user_id;
        if($cart->exists()){
            $incompleteCart = $cart->latest()->first();
            $newCart = new Cart();
            $newCart->request_id = $incompleteCart->request_id;
            $newCart->product_id = $request->product_id;
            $newCart->seller_id = $sellerId;
            $newCart->user_id = Auth::id();
            $newCart->quantity = $request->quantity;
            $newCart->price_quantity = $request->quantity * $produce->price;
            $newCart->save();
        }else{
            $newCart = new Cart();
            $newCart->request_id = $requestId;
            $newCart->product_id = $request->product_id;
            $newCart->seller_id = $sellerId;
            $newCart->user_id = Auth::id();
            $newCart->quantity = $request->quantity;
            $newCart->price_quantity = $request->quantity * $produce->price;
            $newCart->save();
        }
        
        
        return redirect()->away('/')->with('message', 'Succeffully Added to Cart');
    }

    public function checkout()
    {
        # code...
        $cart = Cart::join('crops', 'crops.id', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->where('carts.status', 0)
            ->select('carts.*', 'crops.img', 'crops.price_per', 'crops.price', 'crops.quantity as max_quantity', 'crops.name as cropName')
            ->get();
            
        // dd($cart);
        $sum = Cart::where('carts.user_id', Auth::id())
        ->where('carts.status', 0)->sum('price_quantity');
        
        $user = User::where('id', Auth::id())->first();
        
        $requestId = (string) Str::uuid();
            
        return view('checkout', compact('cart', 'sum', 'user', 'requestId'));
    }
    
    public function paymentRedirect(Request $request)
    {
        # code...
        Log::info($request);
        $status = $request->status;
        $tx_ref = $request->tx_ref;
        
        $cart = Cart::where('user_id', Auth::id())->where('status', 0);
        $cartSum = $cart->sum('price_quantity');
        
        $cartt = $cart->latest()->first();
        $count = $cart->count();
        Log::info('count: '.$count);
        
        $reference = $cartt->request_id;
        
        $transactions = new Transaction();
        $transactions->user_id = Auth::id();
        $transactions->cart_reference = $reference;
        
        if($status == 'successful'){
            $transactions->status = 1;
        }else{
            $transactions->status = 2;
        }
        
        $transactions->tx_ref = $tx_ref;
        $transactions->item_count = $count;
        $transactions->total = $cartSum;
        $transactions->save();
        
        $transaction = Transaction::latest()->first();
        $cartItems = $cart->get();
        
        if($status == 'successful'){
            foreach($cartItems as $item){
                
                $order = new Order();
                $order->product_id = $item->product_id;
                $order->quantity = $item->quantity;
                $order->seller_id = $item->seller_id;
                $order->buyer_id = Auth::id();
                $order->transaction_id = $transaction->id;
                $order->cart_request_id = $item->request_id;
                $order->total_items = $count;
                $order->save();
                
                $cr = Crop::where('id', $item->product_id);
                $crop = $cr->first();
                $newQuantity = $crop->quantity - $item->quantity;
                $cr->update([
                    'quantity' => $newQuantity,
                ]);
            }
            
            
            
            Cart::where('user_id', Auth::id())->where('status', 0)->update([
                'status' => 1
            ]);
        }else{
            Cart::where('user_id', Auth::id())->where('status', 0)->update([
                'status' => 2
            ]);
        }
        
        return view('paymentStatus', compact('status'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Crop::where('id', $id)->first();
        return view('cartDetail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
