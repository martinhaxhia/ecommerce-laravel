@extends('frontend')


@section('content')
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif
                    <h3 class="text-3xl text-bold">You have added to Cart </h3>
                    <div class="flex-1">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            Select a product
                            <select name="product">
                                @foreach($products as $product)
                                    <option value="{{ $product->id  }}">{{ $product->name  }}</option>
                                @endforeach
                            </select>
                            quantity <br/>
                            <input name="quantity" type="number" min="1" >
                            <input type="submit">Add to cart</input>
                        </form>
                    </div>
                    <div class="flex-1">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th> Price</th>
                                <th> Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session('cart') as $id => $details)
                                <tr class="row-product" data-id="{{ $id }}" data-price="{{ $details['price'] }}">
                                    <td>
                                        <p >{{ $details['name'] }}</p>
                                    </td>
                                    <td data-th="Quantity">
                                        <input type="number" min="1" value="{{ $details['quantity'] }}" class="quantity update-cart row-quantity" />
                                    </td>
                                    <td>
                                            <span class="row-price" >
                                                ${{ $details['price'] }}
                                            </span>
                                    </td>
                                    <td>
                                            <span class="row-total">
                                                ${{ $details['price'] * $details['quantity'] }}
                                            </span>
                                    </td>
                                    <td class="actions" data-th="">
                                        <form action="{{ route('remove.from.cart', $id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="buttons">
                            <form action="{{ route('cart.update') }}" id="saveCartBtn" method="POST">
                                @csrf
                                <button class="btn btn-info">Save the cart</button>
                            </form>
                            <form action="{{ route('clearCart') }}" method="POST">
                                @csrf
                                <button class="btn btn-warning">Remove All Cart</button>
                            </form>
                            <h4> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
