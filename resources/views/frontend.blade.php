
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to cart</title>
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div  class="bg-white">
    <header>
        <div class="container px-6 py-3 mx-auto">

<<<<<<< HEAD
                <div class="flex items-center justify-end w-full">
                    <button class="mx-4 text-gray-600 focus:outline-none sm:mx-0">

                    </button>
                </div>
            </div>
            <nav id="navi" class=" p-6 mt-4 bg-blue  sm:flex sm:justify-center sm:items-center">
                <div class="flex flex-col sm:flex-row">
                    <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="/">Home</a>
                    <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="{{ route('products.list')}}">Shop</a>
                    <a href="{{ route('cart.list') }}" class="flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
=======
            <nav  class="navigation ">
                <div class="topnav" id="myTopnav">
                    <a href="/" class="active"><i class="fa fa-fw fa-home"></i>Home</a>
                    <a href="#about">Account <i class="fa fa-user" aria-hidden="true"></i>
>>>>>>> ff2ae1e7393b0294856f3a738a71252ce6dea230
                    </a>
                    <a href="{{ route('cart.list') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    {{ Cart::getTotalQuantity()}}

                </div>
            </nav>
        </div>
    </header>

</div>

@yield('content')

</body>
</html>

