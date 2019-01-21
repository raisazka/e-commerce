@extends('layouts.app')

@section('content')
<div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
        {{ Session::get('success') }}
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div>
                <form action="{{route('user.topup')}}" method="POST">
                        @csrf
                        <div class="form-group mt-5">
                          <label for="topup">Top Up Amount</label>
                          <input type="number" class="form-control" id="topup" name="amount">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
            </div>
            <p class="mt-3">Your Account Balance</p>
            @if($topup == null)
            <h1>Havent top up yet</h1>
            @else
           <h1>{{$topup->amount}}</h1>
           @endif 
        </div>
    </div>
</div>
@endsection
