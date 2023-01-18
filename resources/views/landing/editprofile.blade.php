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
                    <h5 class="card-title">Edit Profile</h5>
                    <form method="POST" action="/edit-profile">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">New Username</label>
                            <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">New Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                        </div>
                        <input type="text" name="role" class="form-control" value="{{ Auth::user()->role }}" hidden>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
