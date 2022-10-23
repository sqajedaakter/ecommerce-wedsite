@extends('frontend.master')
@section('contant')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Customer Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Customer Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div  class="container-fluid pt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <span style="font-size: 18px">Login</span>
                    </div>
                </div>
             <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter email"/>
                    </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter password"/>
                    </div>
                    <button type="submit" name="btn" class="btn btn-block btn-success">Login</button>
                </form>
             </div>
        </div>
        </div>
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <span style="font-size: 18px">Registration</span>
                    </div>
                </div>
             <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                     <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter name"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter email"/>
                    </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter password"/>
                    </div>
                     <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter password confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" name="btn" class="btn btn-block btn-success">Registration</button>
                </form>
             </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
