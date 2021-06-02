@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Edit List
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
            @foreach($edit_category_product as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Product</label>
                        <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description Product</label>
                        <textarea style="resize:none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Description Product">
                        </textarea>
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Update List</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection