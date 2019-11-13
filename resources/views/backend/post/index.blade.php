@extends('backend.layout.master')

@section('content')

    <div class="section-header">
        <h1>Posts list</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Post list</h3>
                            <div class="card-header-action">
                                <a href="{{ route('post.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                        class="far fa-edit"></i> Add new post</a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>

                                </tr>
                                @if(count($posts)>0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="{{ route('post.show',$post->id)}}"
                                                       class="btn btn-icon btn-secondary">
                                                        <i class="far fa-user"></i>
                                                    </a>
                                                    <a href="{{ route('post.edit',$post->id) }}"
                                                       class="btn btn-icon btn-primary">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('post.destroy',$post->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-icon btn-danger"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            There is no data
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
