<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Services\MediaService;
use App\Services\ProductService;

use App\Models\Product;
use App\Models\Media;

use Brian2694\Toastr\Toastr;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productService;
    private $mediaService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService,MediaService $mediaService)
    {
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
        return  view ('admin.create');
    }

    /**
     * @param StoreProductRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function store(StoreProductRequest $request)
    {
        $file = $request->file('image');

        $validated = $request->validated();

        $data = $request->all();

        $data['image'] = $file;

        $product = $this->productService->create($data);

        return back();

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $products = Product::get();
        $trashed = Product::onlyTrashed()->get();
        return view('admin.products', compact('products',"trashed"));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit( Product $product)
    {
        return view('admin.edit',compact('product'));
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

                $newImage = $this->mediaService->delete($product);

                $newProduct = $this->productService->updateProduct($product, $data);

                return back();


            } catch (\Throwable $th) {

            }
        } else {

            $data = $request->all();

            $newProduct = $this->productService->updateProduct($product, $data);

            return back();

        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

        return back();

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();

        return back();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function restoreAll()
    {
        Product::onlyTrashed()->restore();

        return back();
    }

}
