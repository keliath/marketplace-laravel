@extends('backend.layouts.master')
@section('content')

    @include('backend.include.message')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3>Update ChildCategory</h3>

            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" action="{{ route('childcategory.update',$childcategory->id) }}" method="post">@csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name of childcategory" value="{{$childcategory->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subcategory_id">Choose Category</label>
                            <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                <option value="" disabled selected>Select Category</option>
                                @foreach (App\Models\Subcategory::all() as $subcategory)
                                    <option value="{{$subcategory->id}}" {{$childcategory->subcategory_id == $subcategory->id?'selected':''}}>{{$subcategory->name}}</option>
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
