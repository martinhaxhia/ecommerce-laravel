@extends('frontend')


@section('content')
    <div class="container px-6 mx-auto">
        <div class="row">
            @foreach ($products as $product)
                <div class="col col-md-3">
                    <div class="card">
                        <img src="{{ url($product->image) }}" alt="" >

                        <div class="card-body">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <strong class="mt-2">${{ $product->price }}</strong>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="rounded btn btn-success">Add To Cart</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection

