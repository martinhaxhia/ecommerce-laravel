@extends('frontend')

@section('content')
    <div class="container">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 has-validation">
                <label for="name" class="form-label">Product name</label>
                <input name="name" value="My product" type="text" class="form-control" id="name" aria-describedby="name"/>
                @error('name')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product price</label>
                <input name="price" value="255" type="text" class="form-control" id="price" aria-describedby="price"/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product description</label>
                <input name="description" value="my description" type="text" class="form-control" id="description" aria-describedby="description"/>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product image</label>
                <input name="image" value="https://images.pexels.com/photos/1149137/pexels-photo-1149137.jpeg?cs=srgb&dl=pexels-kelson-downes-1149137.jpg&fm=jpg&w=640&h=427" type="text" class="form-control" id="image" aria-describedby="image"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
