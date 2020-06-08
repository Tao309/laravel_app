@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('news.admin.categories.create') }}">Add</a>
                </nav>

                <div class="card">
                    <div class="card-header">Categories List</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Parent</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                @php /** @var \App\Models\News\Category $model */ @endphp
                                <tr>
                                    <td>{{ $model->id }}</td>
                                    <td>
                                        <a href="{{ route('news.admin.categories.edit', $model->id) }}">{{ $model->title }}</a>
                                    </td>
                                    <td>{{ $model->parent_id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($models->total() > $models->count())
            <div class="row justify-content-center">
                <div class="m-4">{{ $models->links() }}</div>
            </div>
        @endif
    </div>
@endsection
