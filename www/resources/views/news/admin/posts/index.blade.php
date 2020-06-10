@extends('layouts.app')

@section('content')
    <div class="container">
        @include('news.admin.posts.includes.result_message')

        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('news.admin.posts.create') }}">Add</a>
                </nav>

                <div class="card">
                    <div class="card-header">Posts List</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Is Published</th>
                                    <th>Published At</th>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $model)
                                @php /** @var \App\Models\News\Post $model */ @endphp
                                <tr>
                                    <td>{{ $model->id }}</td>
                                    <td>
                                        <a href="{{ route('news.admin.posts.edit', $model->id) }}">{{ $model->title }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('news.admin.categories.edit', $model->category->id) }}">{{ $model->category->title }}</a>
                                    </td>
                                    <td>{{ $model->is_published ? 'Yes' : 'No' }}</td>
                                    <td>
                                        {{ $model->published_at ? \Carbon\Carbon::parse($model->published_at)->format('d.m.Y H:i') : '' }}
                                    </td>
                                    <td>{{ $model->author->name }}</td>
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
