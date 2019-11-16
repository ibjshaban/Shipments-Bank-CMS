@extends('backend.layout.master')

@section('pageTitle','Pages')


@section('content')

    <div class="section-header">
        <h1>Pages list</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Users list</h3>
                            <div class="card-header-action">
                                <a href="{{ route('page.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                        class="far fa-edit"></i> Add new page </a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>content</th>
                                    <th>author</th>
                                    <th>Actions</th>
                                </tr>
                                @if(count($pages)>0)
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $page->id }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->content }}</td>
                                            <td>{{ $page->user->name }}</td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="{{ route('page.show',$page->id)}}"
                                                       class="btn btn-icon btn-secondary">
                                                        <i class="far fa-user"></i>
                                                    </a>
                                                    <a href="{{ route('page.edit',$page->id) }}"
                                                       class="btn btn-icon btn-primary">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('page.destroy',$page->id) }}" method="post">
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
