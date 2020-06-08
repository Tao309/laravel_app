@php
    /** @var \App\Models\News\Category $model */
    /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @if($model->exists)
                <div class="card-header">{{ $model->title }}</div>
            @endif
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Information</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" value="{{ old('title', $model->title) }}"
                                id="title"
                                type="text"
                                class="form-control"
                                minlength="5"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" value="{{ old('slug', $model->slug) }}"
                                id="slug"
                                type="text"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <select name="parent_id"
                                id="parent_id"
                                type="text"
                                class="form-control"
                                required
                            >
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                        @if($categoryOption->id == old('parent_id', $model->parent_id)) selected @endif
                                    >
                                        {{ $categoryOption->id }}. {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
