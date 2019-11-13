@extends('backend.layout.master')

@section('pageTitle','Add new category')

@section('content')

    <div class="section-header">
        <h1>Add a new category</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>New category details</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Category full name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}"
                                           required>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer mt-1">
                            <button type="submit" class="btn btn-lg btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
