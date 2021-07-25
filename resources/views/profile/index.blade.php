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

                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <form action="{{route('user-password.update')}}" method="post">@csrf
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
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="form-control" id="">
                                @error('password')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Condfirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="">
                                @error('password_confirmation')
                                    <div>{{ $message }}</div>
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
