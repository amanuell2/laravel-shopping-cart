<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;

use Stripe\Stripe;
use Stripe\Charge;


class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getProduct()
    {
        return view('shop.addProduct');
    }

    public function postProduct(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $rand = substr(str_shuffle($string), 0, 12);
        $products = new Product([
            'imagePath' => $rand . $request['title'],
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
        $products->save();
//add image to storage
        $file = $request->file('imagePath');
        $filename = $rand . $request['title'] . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));;
        }

        return redirect()->route('product.index')->with('success', 'you added product successfully');
    }

    public function getProductImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }


    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->Session()->put('cart', $cart);
        /*
         * @ little test to se if it works
         *
         * @ dd($request->Session()->get('cart'));
         */

        return redirect()->route('product.index');
    }

    public function getReduceByOne($id)
    {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reducedByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.ShoppingCart');

    }

    public function getReduceAll($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceAll($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.ShoppingCart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('product.ShoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        stripe::setApiKey('Your stripe api key');

        try {
            Charge::create(array(
                'amount' => $cart->totalPrice * 100,
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'description' => 'test charge'
            ));
            $order = new Order();
            // $order->user_Id= $request->input();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->payment_id = '';

            Auth::user()->orders()->save($order);

        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'successfully purchased products!');


    }


}
