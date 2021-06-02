@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit Product
        </header>
        <div class="panel-body">
            <?php
            use Illuminate\Support\Facades\Session;
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('$message', null);
            }
            ?>
            <div class="position-center">
                @foreach($edit_product as $key => $pro)
                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Product</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Name" value="{{$pro->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Image</label>
                        <input type="file" class="form-control" name="product_image" id="exampleInputPassword1">  
                        <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Description</label>
                        <textarea style="resize:none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" value="">{{$pro->product_desc}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sumary of Product</label>
                        <textarea style="resize:none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" value="">{{$pro->product_content}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">List</label>
                        <select name="product_cate" class="form-control m-bot15">
                            @foreach($cate_product as $key => $cate)
                            @if($cate->category_id == $pro->category_id)
                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @else
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Brand</label>
                        <select name="product_brand" class="form-control m-bot15">
                            @foreach($brand_product as $key => $brand)
                            @if($cate->category_id == $pro->category_id)
                            <option selected value="{{$brand->brand_id}}">{{$cate->category_name}}</option>
                            @else
                            <option value="{{$brand->brand_id}}">{{$cate->category_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Show</label>
                        <select name="product_status" class="form-control m-bot15">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_product" class="btn btn-info">Update Product</button>
                </form>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection