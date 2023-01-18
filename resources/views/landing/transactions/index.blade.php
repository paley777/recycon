@extends('landing.layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">My History Transaction</h2>
        </div>
    </div>
    @if ($carts->count())
        @foreach ($carts as $date => $carts_list)
            <div class="accordion p-5" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ $date }}
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row row-cols-md-3 g-4 p-5">
                                <table class="table table-hover fontlink">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Image</th>
                                            <th scope="col">Item Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts_list as $cart)
                                            @foreach ($products as $product)
                                                <tr>
                                                    @if ($cart->id_product == $product->id)
                                                        <td>{{ $product->image }}</td>
                                                        <td>IDR. {{ number_format($product->price, 2, ',', '.') }}</td>
                                                    @else
                                                    @endif
                                                    <td>{{ $cart->qty }}</td>
                                                    <td>IDR. {{ number_format($cart->total, 2, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h5>Grand Total: IDR. {{ number_format($cart->sum('total'), 2, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h5 class="text-center py-5">Transaction History its Empty! Let's go Shooping</h5>
    @endif
@endsection
