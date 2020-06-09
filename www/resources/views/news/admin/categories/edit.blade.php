@php
    /** @var \App\Models\News\Category $model */
@endphp

@extends('layouts.app')

@section('content')
        <div class="container">
            @include('news.admin.categories.includes.result_message')

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
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @include('news.admin.categories.includes.left_tab')
                        </div>
                        <div class="col-md-3">
                            @include('news.admin.categories.includes.right_tab')
                        </div>
                    </div>
            </form>
        </div>

    @if($model->exists)
        <form method="POST" action="{{ route('news.admin.categories.destroy', $model->id) }}">
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
