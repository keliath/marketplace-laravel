@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                @include('sidebar')
            </div>

            <div class="col-md-9">
                @include('backend.include.message')
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ads as $key=>$ad)

                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td style='width:200px;height:100px'>
                                    <div id="carouselExampleControls{{$ad->id}}" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{ Storage::url($ad->feature_image) }}"
                                                    width="50" alt="{{ $ad->name }}">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ Storage::url($ad->first_image) }}"
                                                    width="50" alt="{{ $ad->name }}">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ Storage::url($ad->second_image) }}"
                                                    width="50" alt="{{ $ad->name }}">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls{{$ad->id}}" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls{{$ad->id}}" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $ad->name }}</td>
                                <td style="color:blue">USD {{ $ad->price }}</td>
                                <td>
                                    @if ($ad->published == 1)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('ads.edit', [$ad->id]) }}"><button
                                            class="btn btn-primary">Edit</button></a></td>
                                <td><button class="btn btn-info">View</button></td>
                            </tr>

                        @empty

                            <tr>
                                <td>no ads to show</td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
