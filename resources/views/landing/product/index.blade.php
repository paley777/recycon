@extends('landing.layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">Our Products</h2>
        </div>
    </div>
    @if ($products->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 p-5">
            @foreach ($products as $key => $product)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ url('public/images/'.$product->image) }}" style=" width:300px; height: 100%;">
                        <div class="card-body">
                            <div class="bg-light d-flex justify-content-between">
                                <div>
                                    <h5>{{ $product->name }}</h5>
                                </div>
                                <div>{{ $product->category }}</div>
                            </div>
                            <p class="card-text">IDR. {{ number_format($product->price, 2, ',', '.') }}</p>
                            <a href="/detail-product/{{ $product->id }}" class="btn btn-sm bg-warning">Detail Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h5 class="text-center py-5">Uh-Oh! Product is Empty!</h5>
    @endif

    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
