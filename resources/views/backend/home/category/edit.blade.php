
@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Category </h6>
            </div>
            <div class="card-body">

                <!-- form start -->
                <form method="POST" action="{{ route('category.update',$category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Category Name</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Category Name">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
