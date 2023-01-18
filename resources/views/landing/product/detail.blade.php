@extends('landing.layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">Detail Product</h2>
        </div>
    </div>
    <div class="mb-3 p-5 m-5">
        <div class="row g-5">
            <div class="col-md-4">
                <img src="{{ url('public/images/'.$product->image) }}" style=" width:400px; height: 100%;">
            </div>
            <div class="col-md-8 ">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <br>
                    <h7 class="fw-bold">Category:</h7>
                    <br>
                    <h7 class="">{{ $product->category }}</h7>
                    <hr>
                    <h7 class="fw-bold">Price:</h7>
                    <br>
                    <h7 class="">IDR. {{ number_format($product->price, 2, ',', '.') }}</h7>
                    <hr>
                    <h7 class="fw-bold">Description:</h7>
                    <br>
                    <h7 class="">{{ $product->description }}</h7>
                    <hr>

                    @if (Auth::check())
                        @if (Auth::user()->role == 'customer')
                            <form method="POST" action="/add-to-cart">
                                @csrf
                                <input type="text" hidden name="id_product" value="{{ $product->id }}">
                                <input type="text" hidden name="total" value="0">
                                <input type="text" hidden name="id_customer" value="{{ Auth::user()->id }}">
                                <h7 class="fw-bold">Qty:</h7>
                                <input type="number" min="0" step="1" name="qty">
                                <button type="submit" class="btn btn-sm btn-primary">Add to Cart</button>
                            </form>
                        @else
                        @endif
                    @else
                        <a href="/login" class="btn btn-sm bg-warning">Login to Buy</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
