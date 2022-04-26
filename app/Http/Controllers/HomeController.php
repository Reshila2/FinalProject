<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use App\Filters\QueryFilter;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(PostFilter $request)
    {
        $posts = Post::filter($request)->paginate(3);
        $categories = Category::all();

        return view('mainPage.index',compact(['posts','categories']));
    }

    public function postDetail($id)
    {
        $post = Post::findOrFail($id);
        return view('mainPage.show', compact('post'));
    }
    public function cart()
    {
        return view('mainPage.cart');
    }

    public function addToCart($id)
    {
        $post  = Post::find($id);

        if(!$post) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "title" => $post->title,
                    "quantity" => 1,
                    "price" => $post->price,
                    "img" => $post->img
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $post->title,
            "quantity" => 1,
            "price" => $post->price,
            "img" => $post->img
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

}
