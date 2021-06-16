@extends('layouts.primary')
@section('title')
    Products
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title float-left">Products</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right mb-5" data-toggle="modal" data-target="#createModal">
                        Create
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="{{ route('products.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input required type="text" name="name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="subcategory">Parent(If Any):</label>
                                                    <select required name="category_id" class="form-control">
                                                        <option value="">---Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price: </label>
                                                    <input required type="number" step="0.001" name="price" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="details">Details: </label>
                                                    <input required type="text" name="details" class="form-control">
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $product->id }}">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form method="post" action="{{ route('products.update', $product->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="name">Name:</label>
                                                                <input value="{{ $product->name }}" required type="text" name="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subcategory">Parent(If Any):</label>
                                                                <select name="category_id" class="form-control">
                                                                    <option value="">---Select Category</option>
                                                                    @foreach($categories as $category)
                                                                        @if($product->category_id == $category->id)
                                                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @else
                                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">Price: </label>
                                                                <input value="{{ $product->price }}" required type="number" step="0.001" name="price" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="details">Details: </label>
                                                                <input value="{{ $product->details }}" required type="text" name="details" class="form-control">
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
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Warning !!!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Delete Category: {{ $product->name }} ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
