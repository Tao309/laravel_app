<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Generic\AdminViewAuthController;
use App\Http\Requests\News\CategoryUpdateRequest;
use App\Repositories\News\CategoryRepository;

class CategoryController extends AdminViewAuthController
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();

        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $models = $this->categoryRepository->getModelsWithPaginate(12);

        return view('news.admin.categories.index', compact('models'));
    }

    public function create()
    {
        $model = $this->categoryRepository->getNewModel();
        $categoryList = $this->categoryRepository->getModelsForSelectField();

        return view('news.admin.categories.create', compact('model', 'categoryList'));
    }

    public function store(CategoryUpdateRequest $request)
    {
        $data = $request->input();
        $model = $this->categoryRepository->createNewModel($data);

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

    public function edit($id)
    {
        $model = $this->categoryRepository->getModelForEdit($id);
        if(empty($model)) {
            abort(404);
        }

        $categoryList = $this->categoryRepository->getModelsForSelectField();

        return view('news.admin.categories.edit', compact('model', 'categoryList'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $model = $this->categoryRepository->getModelForUpdate($id);

        if(empty($model)) {
            return back()
                ->withErrors(['msg' => "Category with ID equal {$id} not found"])
                ->withInput();
        }

        $data = $request->input();

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
        $model = $this->categoryRepository->getModelForDelete($id);

        if(empty($model)) {
            return back()
                ->withErrors(['msg' => "Category with ID equal {$id} not found"])
                ->withInput();
        }

        $result = $model->delete();

        if($result) {
            return redirect()
                ->route('news.admin.categories.index')
                ->with(['success' => "Category {$id} deleted!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while deleting"])
                ->withInput();
        }
    }
}
