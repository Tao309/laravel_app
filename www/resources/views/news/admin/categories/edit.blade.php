@php
    /** @var \App\Models\News\Category $model */
@endphp

@extends('layouts.app')

@section('content')
    <form method="POST"
          @if($model->exists)
            action="{{ route('news.admin.categories.update', $model->id) }}"
          @else
            action="{{ route('news.admin.categories.store') }}"
          @endif
    >
        @if($model->exists)
            @method('PATCH')
        @endif

        @csrf
        <div class="container">
            @php
                /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('news.admin.categories.includes.left_tab')
                </div>
                <div class="col-md-3">
                    @include('news.admin.categories.includes.right_tab')
                </div>
            </div>
        </div>
    </form>

    @if($model->exists)
        <form method="POST" action="{{ route('news.admin.categories.update', $model->id) }}">
            @method('DELETE')
            @csrf

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8"></div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

@endsection
