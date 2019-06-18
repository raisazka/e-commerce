<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">ß
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
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img class="img-profile" src="https://pwco.com.sg/wp-content/uploads/Generic-Profile-Placeholder-v3.png" alt="no-image">
        </div>
        <div class="offset-md-2 col-md-6">
            <div class="content">
            <label for="">Name</label>
            <p>{{Auth::user()->name}}</p>
            <label for="">Email</label>
            <p>{{Auth::user()->email}}</p>
            <label for="">Address</label>
            <p>{{Auth::user()->address}}</p>
            <label for="">Date of Birth</label>
            <p>{{Auth::user()->dob}}</p>
            <label for="">Gender</label>
            <p>{{Auth::user()->gender}}</p>
            <label for="">Account Balance</label>
            @if($topup == null)
            <p style="color:red">Havent top up yet</p>
            @else
            <p style="color:green">Rp{{number_format($topup->amount)}}</p>
            @endif
            <button class="btn btn-topup" data-toggle="modal" data-target="#exampleModal">Top-Up Now</button>
                </div>
            </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="{{route('user.topup')}}" method="POST">
                @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Top Up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group mt-2">
                <label for="topup">Top Up Amount</label>
                <input type="number" class="form-control" id="topup" name="amount">
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Top Up</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>