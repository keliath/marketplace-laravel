@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @if ($user->avatar)
                            <img class=" img-fluid rounded-circle d-block mx-auto img-thumbnail" src="{{ Storage::url($user->avatar) }}" alt="">
                        @else
                            <img src="/img/default.png" alt="user image default">
                        @endif
                        <p class="text-center">{{$user->name}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @forelse ($advertisements as $ad)
                                <div class="col-4">
                                    <a href="{{ route('product.view', [$ad->id, $ad->slug]) }}">
                                        <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail"
                                            alt="{{ $ad->name }}">
                                        <p class="text-center  card-footer" style="color: blue;">
                                            {{ $ad->name }}/USD {{ $ad->price }}
                                        </p>
                                    </a>
                                </div>
                            @empty
                                sorry, No products here
                            @endforelse
                        </div>
                    </div>
                </div>
                {{ $advertisements->links() }}
            </div>

        </div>
    </div>


@endsection
