@extends('backend.layouts.master')
@section('content')

    @include('backend.include.message')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3>Add ChildCategory</h3>

            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('childcategory.store') }}" method="post">@csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name of childcategory">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subcategory_id">Choose subcategory</label>
                            <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                <option value="" disabled selected>Select subcategory</option>
                                @foreach (App\Models\Subcategory::all() as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
