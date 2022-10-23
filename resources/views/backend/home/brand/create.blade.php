@extends('backend.master')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Brand </h6>
        </div>
        <div class="card-body">

            <!-- form start -->
            <form method="POST" action="{{ route('brands.store') }}">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($category as $categori )
                            <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter brand Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter brand Name">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Brand</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection