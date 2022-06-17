@extends('user.acount')

@section('content')

    <section class="vh-100 bg-light w-75" >
    <div class="">
        <div class="row d-flex  align-items-center pt-5">
            <div class="col col-lg-12 ">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center "
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="{{$user->full_image_url}}"
                                 alt="Avatar" class="img-fluid my-5" style="width: 150px;" />
                            <h2>{{$user->name}}</h2>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{$user->email}}</p>
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
