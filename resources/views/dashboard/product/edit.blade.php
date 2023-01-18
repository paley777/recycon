@extends('landing.layouts.main')

@section('container')
    <div class="card mb-3 p-5 m-5">
        <div class="row g-0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Edit Item</h5>
                    <form method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Item ID</label>
                            <input type="text" name="item_id" value="{{ $product->item_id }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <input type="text" name="id" value="{{ $product->id }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Item Price</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $product->price }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category</label>
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Recycle">Recycle</option>
                                <option value="Second">Second</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Item Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Item Description</label>
                            <textarea class="form-control" aria-valuetext="{{ $product->description }}" name="description"
                                placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image File Upload</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
