@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                @include('sidebar')
            </div>

            <div class="col-md-5">
                @include('backend.include.message')
                <div class="card">
                    <div class="card-header text-white" style="background-color: red">
                        Update Profile
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ auth()->user()->address }}">
                            </div>

                            <div class="form-group">
                                <label for="">Profile Image</label>
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success">Your password has been updated</div>
                @endif
                <form action="{{ route('user-password.update') }}" method="post">@csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header text-white" style="background-color: red">
                            Change Password
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" name="current_password" class="form-control" id="">
                                @error('current_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="form-control" id="">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Condfirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
