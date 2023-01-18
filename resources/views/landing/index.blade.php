@extends('landing.layouts.main')

@section('container')
    <div id="carouselExampleSlidesOnly" class="carousel carousel-dark" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.nspackaging.com/wp-content/uploads/sites/4/2019/03/shutterstock_1492626947.jpg"
                    class="d-block w-100" style="height: 500px; object-fit: cover;filter: brightness(80%);">
                <div class="carousel-caption d-none d-md-block" style="padding-bottom: 11.25rem;">
                    <h1 style="color: yellow;">RECYCON SHOP</h1>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">ABOUT US</h2>
            <p class="card-text">We are shop for buying recycle things and second hand things</p>
        </div>
    </div>
    <hr>
@endsection
