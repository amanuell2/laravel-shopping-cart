@extends ('layout.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::get('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <sapn class="badge"> {{$product['qty']}}</sapn>
                            <strong>{{$product['item']['title']}}</strong>
                            <span class="label label-success">{{$product['price']}}</span>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('product.reduce',['id'=>$product['item']['id']])}}">Reduced by
                                            1</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('product.remove',['id'=>$product['item']['id']])}}">Reduced
                                            All</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h1>No Items in Cart!</h1>
            </div>
        </div>

    @endif

@endsection