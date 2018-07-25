<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('product.index')}}">Shop</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Products</a></li>
                <li><a href="#">Product Detail</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('product.ShoppingCart')}}"> <i class="fa fa-shopping-cart fa-lg m-t-2"></i> Shopping Cart
                        <span class="badge"> {{Session::has('cart')? Session::get('cart')->totalQty:''}}</span></a>
                </li>
                @if(Auth::check())
                    <li><a href="{{route('product.add')}}"> <i class="fa fa-plus fa-lg m-t-2"></i> Add Product
                        </a>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user fa-lg m-t-2"></i> User Management <span
                                class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{route('user.profile')}}">User Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href={{route('user.logout')}}><i class="fa fa-sign-out fa-lg m-t-2"></i> Logout</a></li>
                        @else
                            <li><a href="{{route('user.signUp')}}">Sing Up</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.signIn')}}"><i class="fa fa-sign-in fa-lg m-t-2"></i> Sign In</a></li>
                        @endif

                    </ul>
                </li>

            </ul>

        </div>

    </div><!-- /.navbar-collapse -->


</nav>