@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @foreach($models as $model)

                <div class="card">
                    <div class="card-header">{{ $model->title }}</div>

                    <div class="card-body">
                        {{ $model->description }}
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>

@endsection
