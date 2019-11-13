@extends('backend.layout.master')

@section('pageTitle','Add new post')

@section('content')

    <div class="section-header">
        <h1>Add a new post</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4> New Post </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Post title </label>
                                <div class="input-group">
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">

                                <label>Content:</label>
                                <div class="form-group">
                                    <label>Textarea</label>
                                    <textarea name="content" class="form-control" spellcheck="false" rows="50"
                                              required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category_id" class="form-control" required>
                                    <option>-- Please select a category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="card-footer mt-5">
                                <button type="submit" class="btn btn-lg btn-success">Add post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
