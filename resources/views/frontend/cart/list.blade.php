@extends('frontend.master')
@section('contant')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                    $sum=0;
                    @endphp
                    @foreach ($products as $product)

                    <tr>
                        <td class="align-middle"><img src="{{ asset('public/Image/'.$product->products->image) }}"
                                alt="" style="width: 50px;"> {{ $product->products->name}}</td>
                        <td class="align-middle">${{ $product->price}}</td>
                        <td class="align-middle">
                            <form action="{{ url('/update/product/from/cart/'.$product->id) }}" method="post">
                                @csrf
                                <div class="input-group mx-auto" style="width: 100px;">
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                        name="qty" value="{{ $product->qty}}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-check-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td class="align-middle">${{$total = $product->price * $product->qty}}</td>
                        <td class="align-middle"><a href="{{ url('/delete/product/from/cart/'.$product->id) }}"
                                class="btn btn-sm btn-primary"><i class="fa fa-times"> </i></a href=""></td>
                    </tr>
                    @php
                    $sum+=$total;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{ $sum}} </h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">${{ $sum}} </h5>
                    </div>
                    @if (auth()->check())
                    <a href="{{ url('/shipping') }}" class="btn btn-block btn-primary my-3 py-3">Proceed To Order</a>
                    @else
                    <a href="{{ url('/registration') }}" class="btn btn-block btn-primary my-3 py-3">Proceed To
                        Checkout</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection
