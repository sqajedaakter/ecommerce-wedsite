@extends('backend.master')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manage Categories Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($products as $product )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{$product->brand ? $product->brand->name : 'You have not brand' }}</td>
                            <td>{{ $product->category ? $product->category->name : 'You have not category' }}</td>
                            <td><img src="{{ asset('public/Image/'.$product->image) }}" alt=""
                                    style="height: 100px; width: 150px;"></td>
                            <td>
                                <div class="btn-group d-flex justify-content-around">
                                    <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('/product/delete/' . $product->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure this info delete?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection