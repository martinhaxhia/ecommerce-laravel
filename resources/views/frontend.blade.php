
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecom Shop</title>
     <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
     <link href="public/css/main.css" rel="stylesheet">
</head>
<body>
    <div  class="bg-white">
        <header>
            <div class="container px-6 py-3 mx-auto">
                <div class="flex items-center justify-between">


                    <div class="flex items-center justify-end w-full">
                        <button class="mx-4 text-gray-600 focus:outline-none sm:mx-0">
                            test
                        </button>
                    </div>
                </div>
                <nav  class="navigation">
                    <a class=" logo " href="/">
                        <img src="public/img/shop-logo.png" alt="alt">
                        Ecom Shop
                    </a>
                    <div class="flex flex-col sm:flex-row ">
                        <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="/">Home</a>
                        <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="{{ route('products.list')}}">Acount</a>
                        <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="{{ route('order.cofirm')}}">Orders</a>
                        <a href="{{ route('cart.list') }}" class="flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ Cart::getTotalQuantity()}}
                        </a>

                    </div>
                </nav>
            </div>
        </header>

        <main class="my-8">
            @yield('content')
        </main>

    </div>
</body>
</html>
