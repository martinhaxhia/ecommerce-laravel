<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Services\MediaService;
use App\Services\ProductService;

use App\Models\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $mediaService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService,MediaService $mediaService){
        $this->productService = $productService;
        $this->mediaService = $mediaService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return  view ('products.create');
    }

    /**
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request){

        $file = $request->file('image');

        $validated = $request->validated();

        $data = $request->all();

        $data['image'] = $this->mediaService->imageStore($file);
        $product = $this->productService->create($data);

        return redirect()->route('products.index');

    }

    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $validated = $request->validated();

            $data = $request->all();

            $data['image'] = $this->mediaService->imageUpdate($file);

            try {

                Storage::delete('public/products/' . $product->image);

                $newProduct = $this->productService->updateProduct($product, $data);

                return redirect()->route('products.index')
                    ->with('success', 'Product updated successfully');

            } catch (\Throwable $th) {

            }
        } else {

            $data = $request->all();

            $newProduct = $this->productService->updateProduct($product, $data);

            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully');
        }

    }

    public function delete($id)
    {
        $product = Product::find($id);

        return view('products.delete', compact('product'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }

}
