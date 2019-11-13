@extends('backend.layout.master')

@section('pageTitle','Edit category')

@section('headerCSS')
    <link href="//gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="section-header">
        <h1>Edit category</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h4>Update category details</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="my-input">Status</label>
                                <input id="toggle-one" type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger" name="status">
                            </div>

                            <div class="form-group">
                                <label>Category full name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="category_name" class="form-control" value="{{ $category->name }}" required>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer mt-5">
                            <button type="submit" class="btn btn-lg btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footerJS')
    <script src="//gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(function() {
            $('#toggle-one').bootstrapToggle();
        })
    </script>

@endsection
