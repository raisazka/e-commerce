<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shop</title>
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.1.3/dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#">ELECTRONIC A.I.</a>
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
          <a class="dropdown-item" href="#">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
  			</ul>
  		</div>
  	</nav>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="category">
              <h2 id="category-label">Categories</h2>
              <ul class="list-group">
                <li class="list-group-item"><a href="/shop" style="">All</a></li>
                 @foreach ($categories as $category)
                <li class="list-group-item {{$category->id == $id?'active':''}}"> <a href="{{route('shop.categories', $category->id)}}" style="color: white;">{{$category->name}}</a></li>
                @endforeach 
              </ul>
            </div>
          </div>
            <div class="col-lg-8">
              <div class="item-list">
              <h2>Items</h2>
              <hr>
              <div class="row list-product">
                 @foreach($items as $item)
                <div class="col-lg-4 item">
                  <a href="{{route('shop.item', $item->id)}}">
        						<img src="/storage/images/{{$item->image}}" alt="nopic" height="180" width="180">
        					</a>
        					<p class="product-name"><a href="{{route('shop.item', $item->id)}}">{{$item->name}}</a></p>
        					<p class="product-price">Rp{{number_format($item->price)}}</p>
                </div>
                 @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      {{$items->links()}}
    </div>
    <script type="text/javascript" src="{{asset('bootstrap-4.1.3/dist/js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
  </body>
</html>