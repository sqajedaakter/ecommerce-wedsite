@extends('backend.master')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manage Brand Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($brans as $brand)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $brand->name }}</td>
                            <td> {{ $brand->category ? $brand->category->name : 'You have not category' }}</td>
                            <td>
                                <div class="btn-group d-flex justify-content-around">

                                    <form action="{{  route('brands.destroy',$brand->id)  }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{  route('brands.edit',$brand->id)  }}" class="btn btn-info">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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