@extends('backend.layout.master')

@section('content')

    <div class="section-header">
        <h1>tag list</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>tag list</h3>
                            <div class="card-header-action">
                                <a href="{{ route('tag.create') }}" class="btn btn-icon icon-left btn-primary"><i
                                        class="far fa-edit"></i>
                                    Add new tag</a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th width="50%">Name</th>
                                    <th witdth="5%">Actions</th>
                                </tr>
                                @if(count($tag)>0)
                                    @foreach ($tag as $tag)
                                        <tr>
                                            <td>{{ $tag->id }}</td>
                                            <td>{{ $tag->tag_name}}</td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="{{ route('tag.show',$tag->id)}}"
                                                       class="btn btn-icon btn-secondary">
                                                        <i class="far fa-tag"></i>
                                                    </a>
                                                    <a href="{{ route('tag.edit',$tag->id) }}"
                                                       class="btn btn-icon btn-primary">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('tag.destroy',$tag->id) }}" method="post">
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
