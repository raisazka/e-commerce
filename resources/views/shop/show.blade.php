<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-AI</title>
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.1.3/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#">Baby Shop</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
  			<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
  			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
  				<li class="nav-item">
  					<a class="nav-link underline" href="#"><i class="fa fa-shopping-cart"></i> Cart</a>
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
      <h2 class="title">Product 3</h2>
      <hr>
      <div class="row">
        <div class="wrapper">
          <div class="col-lg-4" id="picture">
            	<img src="/storage/images/{{$items->image}}" alt="" height="200" width="200">
          </div>
        </div>
        <div class="col-lg-4 desc">
          <h4 id="description">Description</h4>
          <p>{{$items->description}}</p>
        </div>
        <div class="col-lg-4">
          <div class="kartu">
            <p>Harga</p>
            <h2>Rp{{number_format($items->price)}}</h2>
            <form action="{{route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$items->id}}" name="item_id">
            <input type="submit" class="btn btn-primary" value="Add to Cart">
        </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-distributed">
      <div class="footer-right">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-gitlab"></i></a>
      </div>
      <div class="footer-left">
        <p class="footer-links">
          <a class="link-1" href="#">HOME</a>
          <a href="#">SHOP</a>
          <a href="#">ABOUT</a>
          <a href="#">FAQ</a>
        </p>
        <p>Electronic A.I &copy; 2018</p>
      </div>

    </footer>
    <script type="text/javascript" src="{{asset('bootstrap-4.1.3/dist/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
  </body>
</html>
