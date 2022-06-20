@extends('frontend')


@section('content')
    <style>
        .card{
            margin: auto;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }
        @media(max-width:767px){
            .card{
                margin: 3vh auto;
            }
        }
        .cart{
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }
        @media(max-width:767px){
            .cart{
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }
        .summary{
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }
        @media(max-width:767px){
            .summary{
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }
        .summary .col-2{
            padding: 0;
        }
        .summary .col-10
        {
            padding: 0;
        }.row{
             margin: 0;
         }
        .title b{
            font-size: 1.5rem;
        }
        .main{
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }
        .col-2, .col{
            padding: 4px 1vh;
        }
        .col{
            padding-left: 50px;
        }
        a{
            text-decoration:none;
            padding: 0 1vh;
        }

        .img-fluid{
            max-width: 165px;
            height: 185px;
        }

        .back-to-shop{
            border: none;
            height: 40px;
            background-color:#ffc107;
            margin-top: 0.5rem;
            margin-left: 4.5rem;
        }
        h5{
            margin-top: 4vh;
        }
        hr{
            margin-top: 1.25rem;
        }
        form{
            padding: 2vh 0;
        }
        select{
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }
        input{
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }
        input:focus::-webkit-input-placeholder
        {
            color:transparent;
        }
        .btn{
            color: white;
            font-size: 15px;
            margin-top: 3vh;
            padding: 1vh;
            border-radius: 0;
        }
        .btn:focus{
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }
        .btn:hover{
            color: white;
        }
        a{
            color: black;
        }
        a:hover{
            color: black;
            text-decoration: none;
        }
        #code{
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>
    <main class="my-8">
        @if($count = count(session()->get('cart', [])) == 0)
            <h3 class="text-3xl text-bold">You have added to Cart </h3>
            <form action="{{ route('clearCart') }}" method="POST">
                @csrf
                <button class="btn btn-warning">Return to Shop</button>
            </form>
        @else
            <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <h1>Shopping</h1>
                                <div class="col align-self-center text-right text-muted"> 3 items</div>
                            </div>
                        </div>
                        @foreach(session('cart') as $id => $details)
                        <div class="row border-top border-bottom" data-id="{{ $id }}" data-price="{{ $details['price'] }}">
                            <div class="row main align-items-center">
                                <div class="col-2"><img class="img-fluid" src="{{ $details['image'] }}"></div>
                                <div class="col">
                                    <div class="row text-muted">Shirt</div>
                                    <div class="row">{{ $details['name'] }}</div>
                                </div>
                                <div class="col">
                                    <a href="#">-</a><a href="#" class="border">{{ $details['quantity'] }}</a><a href="#">+</a>
                                </div>
                                <div class="col">&euro; {{ $details['price'] }} </div>
                                <div class="col">&euro; {{ $details['price'] * $details['quantity'] }} </div>
                                <div class="col"> <form action="{{ route('remove.from.cart', $id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </form></div>

                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> <span class="text-muted">Back to shop</span></a>
                            </div>
                            <div class="col">
                                <form action="{{ route('clearCart') }}" method="POST">
                                    @csrf
                                    <button class="back-to-shop"><span class="text-muted">Clear All Cart</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 summary">
                        <div><h5><b>Summary</b></h5></div>
                        <hr>
                        <div class="row">
                            <div class="col" style="padding-left:0;">ITEMS 3</div>
                            <div class="col text-right">&euro; 132.00</div>
                        </div>
                        <form>
                            <p>SHIPPING</p>
                            <select>
                                <option class="text-muted">Special-Delivery- &euro;25.00</option>
                                <option class="text-muted">Fast-Delivery- &euro;15.00</option>
                                <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                            </select>
                        </form>
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">&euro; 137.00</div>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary">CHECKOUT</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection
