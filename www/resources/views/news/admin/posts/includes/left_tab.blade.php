@php
    /** @var \App\Models\News\Post $model */
    /** @var \Illuminate\Database\Eloquent\Collection $categoryList */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @if($model->exists)
                <div class="card-header">
                    {{ $model->title }}
                    @if($model->is_published)
                        [Published]
                    @else
                        [Not Published]
                    @endif
                </div>
            @endif
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#additional" role="tab">Additional</a>
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
                            <label for="slug">Excerpt</label>
                            <textarea name="excerpt"
                                id="slug"
                                type="text"
                                class="form-control"
                                minlength="5"
                                rows="4"
                            >{{ old('excerpt', $model->excerpt) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="slug">Description</label>
                            <textarea name="description"
                                id="description"
                                type="text"
                                class="form-control"
                                minlength="5"
                                rows="16"
                            >{{ old('description', $model->description) }}</textarea>
                        </div>
                    </div>

                    <div class="tab-pane" id="additional" role="tabpanel">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" value="{{ old('slug', $model->slug) }}"
                                   id="slug"
                                   type="text"
                                   class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id"
                                    id="category_id"
                                    type="text"
                                    class="form-control"
                                    required
                            >
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($model->exists && $categoryOption->id == old('category_id', $model->category->id)) selected @endif
                                    >
                                        {{ $categoryOption->id }}. {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check">
                            <input name="is_published" value="0" type="hidden">
                            <input name="is_published"
                                   id="is_published"
                                   type="checkbox"
                                   class="form-check-input"
                                   value="1"
                                   @if($model->is_published) checked="checked" @endif
                            />
                            <label for="is_published" class="form-check-label">Published</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
