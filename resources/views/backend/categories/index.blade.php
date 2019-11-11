@extends('backend.layout.master')

@section('pageTitle','Categories')


@section('content')

    <div class="section-header">
        <h1>Categories list</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Users list</h4>
                            <div class="card-header-action">
                                <a href="{{ route('user.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                        class="far fa-edit"></i> Add new category</a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                @if(count($categories)>0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="{{ route('user.show',$category->id)}}" class="btn btn-icon btn-secondary">
                                                        <i class="far fa-user"></i>
                                                    </a>
                                                    <a href="{{ route('user.edit',$category->id) }}" class="btn btn-icon btn-primary">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('user.destroy',$category->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
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
