@extends('backend.master')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Product </h6>
        </div>
        <div class="card-body">

            <!-- form start -->
            <form method="POST" action="{{ url('/product/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Category Name</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categoris as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Brand Name</label>
                        <select class="form-control" name="brand_id">
                            @foreach ($brands as $brand )
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Product Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Quantity</label>
                        <input type="text" name="qty" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Product Quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product SKU</label>
                        <input type="text" name="sku" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Product Quantity">
                    </div>

                    <div class="form-group">

                        <label for="formFile" class="form-label">Enter Product Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Product Sort Description</label>
                        <input type="text" name="short_description" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Product Sort Description">
                    </div>
                    <div class="form-group">
                        <label>Enter Product Long Description</label>
                        <textarea class="form-control " rows="3" id="summernote" name="long_description">
                                {{-- id="summernote"  --}}
                            </textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection