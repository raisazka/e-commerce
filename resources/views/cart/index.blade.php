@extends('layouts.app')

@section('content')
    <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-success">
            {{ Session::get('error') }}
                </div>
            @endif
                @php
                    $total = 0;    
                @endphp
        <div>
            <h1>{{$carts->count()}} Item(s) in your cart</h1>
        </div>
        <table class="table">
            <thead>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Total Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr>
                        <td>{{$cart->item->name}}</td>
                        <td>{{$cart->item->description}}</td>
                        <td>Rp{{number_format($cart->item->price * $cart->quantity)}}</td>
                        <td>
                            <select name="qty" class="quantity" data-item="{{$cart->id}}">
                             @for ($i = 1; $i <= 5; $i++)
                                <option {{ $cart->quantity == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                            @endfor
                            </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('cart.destroy', $cart->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                </tr>
                @php
                $total += ($cart->item->price * $cart->quantity);
                @endphp
                @endforeach
            </tbody>
        </table>
        <h1>Total Price: Rp{{number_format($total)}}</h1>
    </div>

    <form action="{{route('buy')}}" method="POST" style="margin-left: 700px;">
        @csrf
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
@endsection

@section('extra-js')
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

@endsection