@extends('backend.layout.master')

@section('pageTitle','Show category')

@section('content')

    <div class="section-header">
        <h1>{{ $category->category_name.' Category'}}</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card profile-widget">
                    <div class="profile-widget-description pb-0">
                        <div class="profile-widget-name">{{ $category->category_name }}
                            <div
                                class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div>
                                <div
                                    class="badge badge-light">
                                    {{ ucfirst($category->role) }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-right ">
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary">Edit</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
