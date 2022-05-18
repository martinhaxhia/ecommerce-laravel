@extends('frontend')

@section('content')
    <div class="row" style="margin-bottom: 20px;margin-left: 265px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Edit Product</h3>
            </div>
        </div>
    </div>
    <div class="container">
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3 has-validation">
            <label for="name" class="form-label">Product name</label>
            <input name="name"  type="text" class="form-control" id="name" value="{{ old('name', $product->name)  }}" aria-describedby="name"/>
            @error('name')
            <div class="invalid">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Product price</label>
            <input name="price"  type="number" class="form-control" id="price" value="{{ old('price',$product->price) }}" aria-describedby="price"/>
            @error('price')
            <div class="invalid">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Product description</label>
            <textarea name="description"  type="textarea" class="form-control"  id="description" aria-describedby="description">{{ old('description',$product->description) }}</textarea>
            @error('description')
            <div class="invalid">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product image</label>
            <input name="image"  type="file" class="form-control" id="image"  aria-describedby="image"/>
            @error('image')
            <div class="invalid">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
@endsection
