@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: red;">Filter</div>
                    <div class="card-body">
                        @foreach ($filter as $subcategory)
                            <p>
                                <a href="{{ url()->current() }}/{{ $subcategory->subcategory->slug ?? '' }}">
                                    {{ $subcategory->subcategory->name ?? '' }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
                <br>
                <form action="{{ url()->current() }}" method="get">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Minimun price</label>
                                <input type="text" name="minPrice" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Maximun price</label>
                                <input type="text" name="maxPrice" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-9">
                <div class="row">
                    @forelse ($advertisements as $ad)
                        <div class="col-3">
                            <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail"
                                alt="{{ $ad->name }}">
                            <p class="text-center  card-footer" style="color: blue;">
                                {{ $ad->name }}/USD {{ $ad->price }}
                            </p>
                        </div>
                    @empty
                        sorry, we are unable to find products based on this category
                    @endforelse
                </div>
            </div>

        </div>
    </div>


@endsection