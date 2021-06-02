@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add List
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
                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID </label>
                        <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description List Product</label>
                        <textarea style="resize:none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Description Product">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Show</label>
                        <select name="category_product_status" class="form-control m-bot15">
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Add List</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection