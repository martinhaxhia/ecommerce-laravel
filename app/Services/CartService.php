<?php
namespace App\Services;

use App\Models\Product;

class CartService
{
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "image" => $product->full_image_url,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);
    }
    public function updateCart($request)
    {
        $allCartProducts = $request->products;
        $cart = session()->get('cart', []);

        foreach ($allCartProducts as $id => $product){
            $cart[$id]['quantity'] = $product['quantity'];
        }

        session()->put('cart', $cart);
    }
    public function remove($id)
    {
        $cart = session()->pull('cart', []);
        unset($cart[$id]);

        session()->put('cart', $cart);

    }
    public function removeAll()
    {
        session()->forget('cart');

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');

    }

}
