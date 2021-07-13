@extends('backend.layouts.master');
@section('content')

@include('backend.include.message')

    <h4>Manage Subcategory</h4>
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($subcategories as $subcategory)

                                    <tr>
                                        <td class="category_{{$subcategory->category_id}}">{{$subcategory->category->name}}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td><a href="{{ route('subcategory.edit', [$subcategory->id]) }}"><button
                                                    class="btn btn-sm btn-info"><i
                                                        class="mdi mdi-square-edit-outline"></i></button></a></td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $subcategory->id }}">
                                                <i class="mdi mdi-delete"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $subcategory->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you Sure?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-justify h5">Once deleted never can be recovered. Are you sure tou want to delete this item?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td class="text-center">No Category to display</td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        td.category_1{
            background-color: rgb(136, 98, 98);
        }
        td.category_2{
            background-color: rgb(116, 105, 105);
        }
        td.category_3{
            background-color: rgb(182, 131, 131);
        }
        td.category_4{
            background-color: rgb(89, 99, 65);
        }
        td.category_5{
            background-color: rgb(65, 66, 99);
        }

    </style>

@endsection
