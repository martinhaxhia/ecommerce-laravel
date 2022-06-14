@extends('admin.dashboard')

@section('content')
    <main class="my-8">
        @if(!$products->isEmpty())
        <div class="container px-6 mx-auto">
            <div class="w-full flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <h3 class="text-3xl text-bold">Products </h3>
                    <div class="flex-1">
                        <table class="table" >
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ $item->full_image_url }}" class="cartImg" alt="Thumbnail">
                                        </td>
                                        <td>
                                            <p>{{ $item->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->description }}</p>
                                        </td>
                                        <td>
                                            <p>${{ $item->price }}</p>
                                        </td>
                                        <td>
                                            <p>Active</p>
                                        </td>
                                        <td>
                                    <a class="btn btn-warning" href="{{ route('products.edit',$item->id) }}">Edit</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete Product">
                                        Delete
                                    </a>
                                        </td>
                                    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Are you sure you want to delete {{ $item->name }} ?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('products.destroy', $item->id) }}" method="post">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Yes, Delete Product</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('products.create') }}">Create New Product</a>
            </div>
        </div>
        @endif
    @if(!$trashed->isEmpty())
        <br>
        <div class="container px-6 mx-auto">
            <div class="w-full flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <h3 class="text-3xl text-bold">Products that are disabled </h3>
                    <div class="flex-1">
                        <table class="table" >
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Deleted</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach ($trashed as $trash)
                                    <tr>
                                        <td>
                                            <img src="{{ $trash->full_image_url }}" class="cartImg" alt="Thumbnail">
                                        </td>
                                        <td>
                                            <p>{{ $trash->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $trash->description }}</p>
                                        </td>
                                        <td>
                                            <p>${{ $trash->price }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $trash->deleted_at }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('products.restore',$trash->id) }}">Restore</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('products.restoreAll') }}">Restore All Product</a>
            </div>
        </div>
        @endif
    </main>
@endsection
