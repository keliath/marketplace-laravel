@extends('layouts.app')
@section('content')
    <div id="carouselExampleSlidesOnly" style="margin-top:-25px" class="carousel slide" data-ride="carousel"
        data-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: 250px" src="/img/b1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 " style="height: 250px" src="/img/b2.jpg" alt="Second slide">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <span>
            <h1>Car</h1>
            <a href="#" class="float-right">View all</a>

        </span>
        <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        {{-- @forelse ($fisrt as $item) --}}
                        <div class="col-3">
                            <img src="/img/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer" style="color: blue;">
                                Name of product/$500
                            </p>
                        </div>
                        {{-- @empty

                        @endforelse --}}

                        {{-- delete --}}
                        <div class="col-3">
                            <img src="/img/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/img/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/img/product/car1.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>
                        {{-- delete --}}

                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        {{-- copy carousel --}}
                        <div class="col-3">
                            <img src="/img/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/img/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/img/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                        <div class="col-3">
                            <img src="/img/product/car2.jpg" class="img-thumbnail">
                            <p class="text-center  card-footer">
                                Name of product/$500
                            </p>
                        </div>

                    </div>
                </div>



            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
