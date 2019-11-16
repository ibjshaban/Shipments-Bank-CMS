@extends('backend.layout.master')

@section('pageTitle','Tags')


@section('content')
    <div class="section-header">
        <h1>Add a New Tag</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('tag.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Add New Tag</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Tage Title</label>
                                <input type="text" name="tag_name" class="form-control col-6" value="{{ old('tag_name') }}"
                                       required>
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-lg btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
