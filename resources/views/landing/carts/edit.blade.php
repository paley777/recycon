@extends('landing.layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">Edit Cart</h2>
        </div>
    </div>
    <div class="mb-3 p-5 m-5">
        <div class="row g-5">
            <div class="col-md-8 ">
                <div class="card-body">
                    <form method="POST" action="/edit-cart">
                        @csrf
                        <input type="text" hidden name="id_cart" value="{{ $cart->id }}">
                        <input type="text" hidden name="id_product" value="{{ $cart->id_product }}">
                        <input type="text" hidden name="total" value="0">
                        <h7 class="fw-bold">Qty:</h7>
                        <input type="number" min="0" value="{{ $cart->qty }}" step="1" name="qty">
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
