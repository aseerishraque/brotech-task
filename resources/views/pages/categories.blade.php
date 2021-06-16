@extends('layouts.primary')
@section('title')
    Categories
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title float-left">Categories</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right mb-5" data-toggle="modal" data-target="#createModal">
                        Create
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="{{ route('categories.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input required type="text" name="name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="subcategory">Parent(If Any):</label>
                                                    <select name="category_id" class="form-control">
                                                        <option value="">---Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Parent_id</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $category->id }}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form method="post" action="{{ route('categories.update', $category->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input value="{{ $category->name }}" required type="text" name="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subcategory">Parent(If Any):</label>
                                                                <select name="category_id" class="form-control">
                                                                    <option value="">---Select Category</option>
                                                                    @foreach($categories as $cat)
                                                                        @if($category->parent_id == $cat->id)
                                                                            <option selected value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                        @else
                                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $category->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Warning !!!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Delete Category: {{ $category->name }} ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection
