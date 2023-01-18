@extends('landing.layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">My Cart</h2>
        </div>
    </div>
    @if ($carts->count())
        <div class="row row-cols-md-3 g-4 p-5">
            <table class="table table-hover fontlink">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Item Image</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $index => $cart)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                @if ($cart->id_product == $product->id)
                                    <td>{{ $product->image }}</td>
                                    <td>IDR. {{ number_format($product->price, 2, ',', '.') }}</td>
                                @else
                                @endif
                                <td>{{ $cart->qty }}</td>
                                <td>IDR. {{ number_format($cart->total, 2, ',', '.') }}</td>
                                <td>
                                    <a href="/my-cart/edit/{{ $cart->id }}" class="badge bg-warning border-0">Edit</a>
                                    <a href="/my-cart/delete/{{ $cart->id }}"
                                        class="badge bg-danger border-0">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row row-cols-md-12 px-5">
            <div class="col">
                <h5>Grand Total: IDR. {{ number_format($cart->sum('total'), 2, ',', '.') }}</h5>
                <h5>Receiver</h5>

                <form method="POST" action="/checkout">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Receiver Name</label>
                        <input type="text" name="receiver_name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Receiver Address</label>
                        <textarea class="form-control" name="receiver_address" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Checkout ({{ $carts->count() }})</button>
                </form>
            </div>
        </div>
    @else
        <h5 class="text-center py-5">Cart its Empty! Let's go Shooping</h5>
    @endif
@endsection
