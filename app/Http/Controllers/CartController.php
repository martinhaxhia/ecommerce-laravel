<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function cart()
    {
        $products = Product::all();

        return view('products.cart', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     */
    public function updateCart(Request $request)
    {

        $allCartProducts = $request->products;
        $cart = session()->get('cart', []);

        foreach ($allCartProducts as $id => $product){
            $cart[$id]['quantity'] = $product['quantity'];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart is  saved!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $cart = session()->pull('cart', []);
        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->route('cart')
            ->with('success','Product deleted successfully');

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeAll()
    {
        session()->forget('cart');

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');

    }
    public function getTotalQuantity(){

        $items = $this->getContent();

        if ($items->isEmpty()) return 0;

        $count = $items->sum(function ($item) {
            return $item['quantity'];
        });

        return $count;
    }
}
