@extends ('layout.master')
@section('title')
    Add Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data" >
                <h2>Add New Product</h2>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" required id="title" name="title">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" required name="description">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" required name="price">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <lable for="image"> Image (only .jpg)</lable>
                        <input type="file" name="imagePath" class="form-control">
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Add Now</button>

            </form>
        </div>
    </div>
@endsection