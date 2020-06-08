<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Generic\AdminViewAuthController;
use App\Http\Requests\News\CategoryUpdateRequest;
use Illuminate\Support\Str;

class CategoryController extends AdminViewAuthController
{
    public function index()
    {
        $models = \App\Models\News\Category::paginate(12);

        return view('news.admin.categories.index', compact('models'));
    }

    public function create()
    {
        $model = \App\Models\News\Category::make();
        $categoryList = \App\Models\News\Category::all();

        return view('news.admin.categories.create', compact('model', 'categoryList'));
    }

    public function store(CategoryUpdateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $model = \App\Models\News\Category::create($data);

        if($model->exists) {
            return redirect()
                ->route('news.admin.categories.edit', $model->id)
                ->with(['success' => "Category created!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while creating"])
                ->withInput();
        }

    }

    public function show($id)
    {
        return redirect()->route('news.admin.categories');
    }

    public function edit($id)
    {
        $model = \App\Models\News\Category::findOrFail($id);
        $categoryList = \App\Models\News\Category::all();

        return view('news.admin.categories.edit', compact('model', 'categoryList'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $model = \App\Models\News\Category::find($id);

        if(empty($model)) {
            return back()
                ->withErrors(['msg' => "Category with ID equal {$id} not found"])
                ->withInput();
        }

        $data = $request->input();

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $model
            ->fill($data)
            ->save();

        if($result) {
            return redirect()
                ->route('news.admin.categories.edit', $model->id)
                ->with(['success' => "Category saved!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while saving"])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $model = \App\Models\News\Category::find($id);

        if(empty($model)) {
            return back()
                ->withErrors(['msg' => "Category with ID equal {$id} not found"])
                ->withInput();
        }

        $result = $model->delete();

        if($result) {
            return redirect()
                ->route('news.admin.categories.index')
                ->with(['success' => "Category deleted!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while deleting"])
                ->withInput();
        }

    }
}
