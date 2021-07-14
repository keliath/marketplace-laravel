@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                @include('sidebar')
            </div>

            <div class="col-md-9">
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
                                <td><img src="{{ Storage::url($ad->feature_image) }}" width="130" alt=""></td>
                                <td>{{ $ad->name }}</td>
                                <td>USD {{ $ad->price }}</td>
                                <td>
                                    @if ($ad->published == 1)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td><button class="btn btn-primary">Edit</button></td>
                                <td><button class="btn btn-danger">View</button></td>
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
