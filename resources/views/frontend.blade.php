
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
            <nav  class="navigation ">
                <div class="topnav" id="myTopnav">
                    <a href="/" class="active"><i class="fa fa-fw fa-home"></i>Home</a>
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    @else
                    <a href="{{ route('product.create') }}">Create</a>
                    <a href="#about">Account <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('cart.list') }}"><i class="fa fa-cart-plus" aria-hidden="true"> </i>
                        {{ Cart::getTotalQuantity()}}
                    </a>
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    @endguest
                </div>
            </nav>
        </div>
    </header>
</div>
@yield('content')
</body>
</html>

