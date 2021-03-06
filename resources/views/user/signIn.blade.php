@extends ('layout.master')

@section('title')
    Sign UP Shopping Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Sign In</h1>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{route('user.signIn')}}" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit">Sign In</button>
                {{csrf_field()}}
            </form>
            <p> don't have Account? <a href="{{route('user.signUp')}}" >Sign Up</a></p>
        </div>
    </div>
@endsection