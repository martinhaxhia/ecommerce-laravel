@extends('frontend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <div class="container ">
                            <div class=" ml-2 d-none d-lg-block">
                             <img class="userImg" src="{{$user->full_image_url}}">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <h1>{{ auth()->user()->name }}</h1>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            My details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            My address book
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            My orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            Account settings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

@endsection
