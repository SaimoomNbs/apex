<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('options')->orderBy('id', 'desc')->get();
        return view('index', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'options.*.name' => 'required|string|max:255',
            'options.*.image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'options.*.price' => 'required|numeric|min:0',
        ]);

        $product = Product::create($request->only(['name', 'category']));

        foreach ($request->options as $option) {
            $imagePath = $option['image']->store('options', 'public');
            $product->options()->create([
                'name' => $option['name'],
                'image_path' => $imagePath,
                'price' => $option['price'],
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $product = Product::findOrFail($id);
        $opt = $product->options()->where('id', $request->option_id)->first();
        $uniqueId = $id.$request->option_id;
        $cart[$uniqueId] = [
            'name' => $product->name,
            'option' => $opt->name,
            'img' => $opt->image_path,
            'price' => $opt->price,
            // 'price' => ($cart[$uniqueId]['price'] ?? 0) + $opt->price,
            'quantity' => ($cart[$uniqueId]['quantity'] ?? 0) + 1,
        ];

        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Product added to cart!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function cart()
    {
        $cart = session()->get('cart');
        return view('cart', compact('cart'));
    }
}
