@extends('frontend')
@section('content')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
    <section class="vh-90 gradient-custom" >
        <div class="container py-5 h-90">
            <div class="row d-flex justify-content-center align-items-center h-90">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('register.custom') }}" method="POST" enctype="multipart/form-data">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Ecommerce</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register an account</h5>
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Name" id="name" class="form-control" name="name" value="{{ old('name') }}"
                                            required autofocus>
                                        @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Email" id="email_address" class="form-control" value="{{ old('email') }}"
                                            name="email" required autofocus>
                                        @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" placeholder="Password" id="password" class="form-control"
                                            name="password" required>
                                        @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-3">
                                            <input name="image"  type="file" class="form-control" id="image" aria-describedby="image" required/>
                                            @error('image')
                                            <div class="invalid">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
