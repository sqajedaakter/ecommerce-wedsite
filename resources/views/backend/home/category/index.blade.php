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
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            @foreach ($category as $categori )
                            <tr> 
                            <td>{{ ++$i }}</td>
                            <td>{{ $categori->name }}</td>
                            <td>{{ $categori->slug }}</td>
                            <td>
                                <div class="btn-group d-flex justify-content-around">
                                    
                                    <form action="{{  route('category.destroy',$categori->id)  }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{  route('category.edit',$categori->id)  }}" class="btn btn-info">Edite</a>
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
