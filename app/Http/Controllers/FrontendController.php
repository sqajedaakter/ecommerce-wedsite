<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Frontend;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderDetail;

use function PHPUnit\Framework\returnSelf;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $hotproducts = Product::orderBy('created_at', 'desc')->take(6)->get();
        $products = Product::orderBy('created_at', 'desc')->get();
        $productCount = Cart::where('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get()->count();
        return view('frontend.home.index', [
            'categories'    => $categories,
            'hotproducts'   => $hotproducts,
            'products'      => $products,
            'productCount'      => $productCount,
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = new Cart();
        if (auth()->check()) {
            $product->user_id = auth()->user()->id;
        } else {
            $product->ip_address = $request->ip();
        }
        $product->product_id = $request->product_id;
        $product->qty = $request->qty ? $request->qty : 1;
        $product->price = $request->price;
        $product->save();
        return redirect()->back()->with('message', 'Products added  successfully.');
    }
    public function cartProducts()
    {
        $productCount = Cart::Where('ip_address', request()->ip)->orwhere('user_id', auth()->check() ? auth()->user()->id : null)->get()->count();
        $products = Cart::with('products')->orwhere('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get();
        return view('frontend.cart.list', compact('productCount', 'products'));
    }
    public function deletecartProducts($id)
    {
        $Product = Cart::find($id);
        $Product->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }

    public function updatecartProducts(Request $request, $id)
    {

        $Product = Cart::find($id);
        $Product->update(
            [
                'qty' => $request->qty,
            ]

        );
        return redirect()->back()->with('message', 'Products qty update successfully.');
    }

    public function registration()
    {
        $productCount = Cart::Where('ip_address', request()->ip)->orwhere('user_id', auth()->check() ? auth()->user()->id : null)->get()->count();
        return view('frontend.auth.registration', compact('productCount'));
    }

    public function shipping()
    {
        $productCount = Cart::Where('ip_address', request()->ip)->orwhere('user_id', auth()->check() ? auth()->user()->id : null)->get()->count();
        $products = Cart::with('products')->orwhere('user_id', auth()->check() ? auth()->user()->id : null)->orWhere('ip_address', request()->ip)->get();
        return view('frontend.auth.shipping', compact('productCount', 'products'));
    }

    public function shippingStore(Request $request)
    {
        $billing = new Billing();
        $billing->user_id = auth()->user()->id;
        $billing->phone = $request->phone;
        $billing->address_one = $request->address_one;
        $billing->address_two = $request->address_two;
        $billing->country = $request->country;
        $billing->city = $request->city;
        $billing->state = $request->state;
        $billing->zip = $request->zip;
        $billing->payment_type = $request->payment_type;
        $billing->save();

        //order tabel data inseat

        if (!empty($billing)) {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->total_qty = $request->total_qty;
            $order->total_price = $request->total_price;
            $order->save();


            //Order datails data insart

            foreach ($request->product_id as $key => $product) {
                $orderProducts = new OrderDetail();
                $orderProducts->order_id = $order->id;
                $orderProducts->product_id = $request->product_id[$key];
                $orderProducts->qty = $request->qty[$key];
                $orderProducts->price = $request->price[$key];
                $orderProducts->save();
            }
        }
        return redirect('/')->with('success', 'Order has been submited');
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
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
