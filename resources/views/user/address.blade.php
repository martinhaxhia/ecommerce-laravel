@extends('user.acount')

@section('content')

    <section class="vh-100 bg-light w-75" >
        <div class="">
            <div class="row d-flex  align-items-center pt-5">
                <div class="col col-lg-12 ">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{$user->full_image_url}}" alt="Avatar" class="img-fluid my-5" style="width: 150px;"/>
                                <h2>{{$user->name}}</h2>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Addresses</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6></h6>
                                            <p class="text-muted"></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <h6>Projects</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Recent</h6>
                                            <p class="text-muted">Lorem ipsum</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Most Viewed</h6>
                                            <p class="text-muted">Dolor sit amet</p>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addressModal" >Add New Address</button>

                                        <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New Address</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('address.create',$user->id) }}" method="post">
                                                            <div class="form-group">
                                                                <label for="address" class="col-form-label">Address:</label>
                                                                <input type="text" class="form-control" id="address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="city" class="col-form-label">City:</label>
                                                                <input type="text" class="form-control" id="city">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="country" class="col-form-label">Country:</label>
                                                                <input type="text" class="form-control" id="country">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="zip-code" class="col-form-label">Zip Code:</label>
                                                                <input type="text" class="form-control" id="zip-code">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Add Address</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
