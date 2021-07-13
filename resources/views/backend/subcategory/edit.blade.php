@extends('backend.layouts.master')
@section('content')

    @include('backend.include.message')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3>Update SubCategory</h3>

            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('subcategory.update',$subcategory->id) }}" method="post">@csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name of subcategory" value="{{$subcategory->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Choose Category</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="" disabled selected>Select Category</option>
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}" {{$subcategory->category_id == $category->id?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
