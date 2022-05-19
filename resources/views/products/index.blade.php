@extends('frontend')

@section('content')
    <div class="container px-6 mx-auto">
        <div class="row">
            @foreach ($products as $product)
                @csrf
                <div class="col col-md-3">
                    <div class="card">
                        <img src="{{$product->full_image_url }}" alt="" >
                        <div class="card-body">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <strong class="mt-2">${{ $product->price }}</strong>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->full_image_url  }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="rounded btn btn-success">Add To Cart</button>
                            </form>
                            <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" id="smallButton" data-target="#smallModal" href="{{ route('delete', $product->id) }}" title="Delete Product">
                                 Delete
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
{{--
                        @extends('products/delete')
--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href
                , beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function() {
                    $('#loader').hide();
                }
                , error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 8000
            })
        });

    </script>
@endsection
