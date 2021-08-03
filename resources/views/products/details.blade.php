@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ Storage::url($advertisement->feature_image) }}"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ Storage::url($advertisement->first_image) }}"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ Storage::url($advertisement->second_image) }}"
                                alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <p>{!! $advertisement->description !!}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">More Info</div>
                    <div class="card-body">
                        <p>Country: {{ $advertisement->country->name }}</p>
                        <p>State: {{ $advertisement->state->name ?? '' }}</p>
                        <p>City: {{ $advertisement->city->name ?? '' }}</p>
                        <p>Product Condition: {{ $advertisement->product_condition }}</p>
                    </div>
                </div>

                @if ($advertisement->link)
                    <div class="card">
                        <div class="card-body">
                            <x-embed url="{{ $advertisement->link }}" />
                        </div>
                    </div>
                @endif

            </div>

            <div class="col-md-6">
                <h1>{{ $advertisement->name }}</h1>
                <p>Price: ${{ $advertisement->price }} USD, {{ $advertisement->price_status }}</p>
                <p>Posted: {{ $advertisement->created_at->diffForHumans() }}</p>
                <p>Listing Location: {{ $advertisement->listing_location }}</p>

                @if (Auth::check() && Auth()->user()->id != $advertisement->user_id )
                    <save-ad user-id="{{ auth()->user()->id }}" ad-id="{{ $advertisement->id }}"></save-ad>
                @endif

                <hr>
                @if ($advertisement->user->avatar)
                    <img src="{{ Storage::url($advertisement->user->avatar) }}" alt="" width="120">
                @else
                    <img src="/img/default.png" alt="" width="120">
                @endif
                <p>
                    <a href="{{ route('show.user.ads', [$advertisement->user_id]) }}">
                        {{ $advertisement->user->name }}
                    </a>
                </p>

                @if ($advertisement->phone_number)
                    <p>
                        <show-number phone-number="{{ $advertisement->phone_number }}" />
                    </p>
                @endif

                @if (Auth()->check())
                    @if (Auth()->user()->id != $advertisement->user_id)
                        <message seller-name="{{ $advertisement->user->name }}" user-id="{{ auth()->user()->id }}"
                            receiver-id="{{ $advertisement->user->id }}" ad-id="{{ $advertisement->id }}"></message>
                    @endif
                @endif
            </div>


        </div>
    </div>


@endsection
