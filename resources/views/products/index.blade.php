@extends('frontend')

@section('content')

    <div class="container px-6 mx-auto">
        <div class="row">
            @foreach ($products as $product)
                @csrf
                @guest
                <div class="col-lg-4">
                    <div class="card">
                        <img class="image" src="{{$product->full_image_url }}" alt="" >
                        <div class="card-body">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <strong class="mt-2">${{ $product->price }}</strong>
                            @else
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <img class="image" src="{{$product->full_image_url }}" alt="" >
                                        <div class="card-body">
                                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                                            <strong class="mt-2">${{ $product->price }}</strong>
                                            <br>
                                            <a class="btn btn-success" href="{{ route('add.to.cart', $product->id) }}">Add To Card</a>
                                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
