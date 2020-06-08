@php
    /** @var \App\Models\News\Category $model */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Action</div>
            <div class="card-body">
                    @if($model->exists)
                        <button type="submit" class="btn btn-primary">Save</button>
                    @else
                        <button type="submit" class="btn btn-success">Create</button>
                    @endif
            </div>
        </div>
    </div>
</div>

@if($model->exists)
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li>ID: {{ $model->id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dates</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="created_at">Created At</label>
                        <input id="created_at" type="text" value="{{ $model->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Updated At</label>
                        <input id="updated_at" type="text" value="{{ $model->updated_at }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
