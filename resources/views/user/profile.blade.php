@extends ('layout.master')
@section('title')
    Sign UP Shopping Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders!</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $items)
                                <li class="list-group-item">
                                    <span class="badge">$ {{$items['price']}}</span>
                                    {{$items['item']['title']}} | {{$items['qty']}} units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer"><Strong>Total Price ${{$order->cart->totalPrice}}</Strong></div>
                </div>
            @endforeach
        </div>
@endsection