@extends('backend.layout.master')

@section('pageTitle','Edit Post')

@section('content')

    <div class="section-header">
        <h1>Edit Post</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h4>Update Post Details</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Post Title</label>
                                <div class="input-group">
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Post Content</label>
                                <div class="input-group">
                                    <textarea name="content" cols="30" rows="10" class="form-control"
                                              required>{{ $post->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <div class="input-group">
                                    <select name="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}" {{ ($category->id == $post->category_id)?'selected:selected':''}}>
                                                {{$category->category_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <div class="input-group">
                                    <input type="text" name="user_name" class="form-control"
                                           value="{{ $post->user->name }}" disabled>
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
