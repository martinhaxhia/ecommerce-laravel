@extends('user.acount')

@section('content')

    <section class="vh-100 bg-light w-75" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

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
                                @foreach ($address as $address)
                                    <div class="row">
                                        <div class="col-3 mb-2">
                                            <h6>Address</h6>
                                            <p class="text-muted">{{$address->address}}</p>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <h6>City</h6>
                                            <p class="text-muted">{{$address->city}}</p>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <h6>Country</h6>
                                            <p class="text-muted">{{$address->country}}</p>
                                        </div>
                                        <div class="col-3 mb-2">
                                            <h6>Zip-code</h6>
                                            <p class="text-muted">{{$address->zip_code}}</p>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-4">

                                        @endforeach
                                    <a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addModal" title="Add Address">
                                        Add new Address
                                    </a>

                                    <div class="modal fade" id="addModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">New Address</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="{{ route('address.create') }}" method="POST" enctype="multipart/form-data">
                                                          @csrf
                                                            <div class="form-group">
                                                                <label for="address" class="col-form-label">Address:</label>
                                                                <input type="text" name="address" class="form-control" id="address" aria-describedby="address"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="city" class="col-form-label">City:</label>
                                                                <input type="text"  name="city" class="form-control" id="city" aria-describedby="city"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="country" class="col-form-label">Country:</label>
                                                                <input type="text"  name="country" class="form-control" id="country" aria-describedby="country"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="zip-code" class="col-form-label">Zip Code:</label>
                                                                <input type="text"  name="zip_code" class="form-control" id="zip_code" aria-describedby="zip-code"/>
                                                            </div>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add Address</button>
                                                        </form>
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
