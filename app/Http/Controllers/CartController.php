<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
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
        $this->cartService->addToCart($id);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     */
    public function updateCart(Request $request)
    {
        $this->cartService->updateCart($request);

        return redirect()->back()->with('success', 'Cart is  saved!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $this->cartService->remove($id);

        return redirect()->route('cart')
            ->with('success','Product deleted successfully');

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeAll()
    {
        $this->cartService->removeAll();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');

    }
    public function getTotalQuantity(){

        return $count = count(session()->get('cart', []));


    }
}
