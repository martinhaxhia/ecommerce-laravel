@extends('frontend')

@section('content')
    <div class="container">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 has-validation">
                <label for="name" class="form-label">Product name</label>
                <input name="name"  type="text" class="form-control" id="name" aria-describedby="name"/>
                @error('name')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product price</label>
                <input name="price"  type="number" class="form-control" id="price" aria-describedby="price"/>
                @error('price')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product description</label>
                <textarea name="description"  type="textarea" class="form-control" id="description" aria-describedby="description"></textarea>
                @error('description')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product image</label>
                <input name="image"  type="file" class="form-control" id="image" aria-describedby="image"/>
                @error('image')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
