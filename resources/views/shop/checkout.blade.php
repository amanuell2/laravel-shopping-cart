@extends ('layout.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Your Total: ${{$total}}</h4>
            <div id="charge-error" class="alert alert-danger {{!Session::has('error')? 'hidden':''}}">
                {{session::get('error')}}
            </div>
            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-name">Credit Card Holder name</label>
                        <input type="text" id="card-name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-number-">Credit Card Number</label>
                        <input type="text" id="card-number" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="month">Expiration Month</label>
                        <input type="text" id="card-expiry-month" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="card-expiry-year">Expiration Year</label><input type="text" id="card-expiry-year" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-cvc">CVS</label>
                        <input type="text" id="card-cvc" class="form-control" required>
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
@endsection
