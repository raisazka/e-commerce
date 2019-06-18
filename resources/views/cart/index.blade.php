<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/">Baby Shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
      
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link underline" href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a>
                        </li>
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/home">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
      
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              </div>
            </li>
                    </ul>
                </div>
            </nav>
        <div class="container">
                @if(Session::has('success'))
                <div class="alert alert-success">
                {{ Session::get('success') }}
                    </div>
                @endif
    
                @if(Session::has('error'))
                <div class="alert alert-danger">
                {{ Session::get('error') }}
                    </div>
                @endif
                    @php
                        $total = 0;    
                    @endphp
            @if ($carts->count() == 0)
                <p style="text-align:center;">Your Cart is Empty</p>
            @else
            <div>
                <h3>{{$carts->count()}} Item(s) in your cart</h3>
            </div>
            @foreach ($carts as $cart)
            <div class="cart">
                    <div class="row">
                        <div class="col-lg-3">
                        <img class="img-cart" src="{{asset('storage/images/'.$cart->item->image)}}" alt="">
                        </div>
                        <div class="col-lg-9">
                            <div class="top">
                                <p class="item-name">{{$cart->item->name}}</p>
                                <div class="top-right">
                                    <p class="">Rp{{number_format($cart->item->price)}}</p>
                                    <select name="qty" class="quantity" data-item="{{$cart->id}}">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option {{ $cart->quantity == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    </select>
                                    <p class="total-item">Rp{{number_format($cart->item->price * $cart->quantity)}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="bottom">
                               <div class="row">
                                    <p class="col-lg-6 item-desc">
                                    {{$cart->item->description}}
                                    </p>
                                    <div class="offset-lg-4">
        
                                    </div>
                                    <div class="col-lg-2">
                                    <form action="{{route('cart.destroy', $cart->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $total += ($cart->item->price * $cart->quantity);
                @endphp
            @endforeach
           <div class="totalz">
                <h4 class="total-price">Total Price: Rp{{number_format($total)}}</h4>
           </div>
        </div>
    
        <form action="{{route('buy')}}" method="POST" style="margin-left: 700px;">
            @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
        @endif
        <script type="text/javascript">
            (function(){
            const classname = document.querySelectorAll('.quantity');
    
            Array.from(classname).forEach(function(element){
             element.addEventListener('change', function(){
                const id = element.getAttribute('data-item');
                axios.patch(`/cart/${id}`, {
                    quantity: this.value,
                    id: id
                  })
                  .then(function (response) {
                    //console.log(response);
                    window.location.href = '{{route('cart.index')}}'
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
           })
         })
            })();
        </script>
        <script src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
</body>
</html>