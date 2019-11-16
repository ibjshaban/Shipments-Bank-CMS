@extends('backend.layout.master')

@section('pageTitle','Add new page')


@section('headerCSS')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')

    <div class="section-header">
        <h1>Add a new page</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>New page </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Content </label>
                                <textarea name="content" cols="30" rows="10"
                                          class="form-control">{{ old('content') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select id="tags" class="form-control tags_items" name="tag_id[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id}}">{{ $tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-footer mt-5">
                            <button type="submit" class="btn btn-lg btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footerJs')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.js"></script>

    <script>
        $(document).ready(function () {
            $(".tags_items").select2({
                tags: true,
            });
        });

    </script>
@endsection
