@extends('landing.layouts.main')

@section('container')
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">Manage Item</h2>
        </div>
    </div>
    <div class="row row-cols-md-3 g-4 p-5">
        <table class="table table-hover fontlink">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Item ID</th>
                    <th scope="col">Item Image</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Item Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $products->firstItem() + $key }}</td>
                        <td>{{ $product->item_id }}</td>
                        <td> <img src="{{ url('public/images/'.$product->image) }}" style=" width:300px; height: 100%;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            <a href="/product/{{ $product->id }}/edit" class="badge bg-warning border-0">Edit</a>
                            <form action="/product/{{ $product->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Anda Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
