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
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ads as $key=>$ad)

                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <a href="{{ route('product.view', [$ad->id, $ad->slug]) }}"
                                        target="_blank">{{ $ad->name }}</a>
                                </td>

                                <td>
                                    <form action="{{ route('remove.ad') }}" method="post">@csrf
                                        <input type="hidden" name="adId" value="{{ $ad->id }}" id="">
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td>no saved ads to show</td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
