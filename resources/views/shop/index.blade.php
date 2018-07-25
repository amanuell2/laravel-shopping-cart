@extends ('layout.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
   @include('partials.category')
    <div class="right-side">
        @if(Session::has('success'))
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="charge-succes" class="alert alert-success">
                        {{Session::get('success')}}
                    </div>

                </div>
            </div>
        @endif
        <!- get 3 product item in the array ->
        @foreach($products->Chunk(3) as $productChunk)
            <div class="row">
                <!- loop through all 3 arrays per row ->
                @foreach($productChunk as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ route('product.getImage',['filename'=> $product->imagePath. '.jpg']) }}" alt=""
                                 class="img-responsive">
                            <div class="caption">
                                <h3 class="title">{{$product->title}}</h3>
                                <p class="description">{{$product->description}}</p>
                                <div class="clearfix">
                                    <div class="pull-left price"><strong> ${{$product->price}} </strong></div>
                                    <a href="{{route('product.AddToCart',['id'=>$product->id])}}"
                                       class="btn btn-default pull-right add-to-cart " role="button"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection