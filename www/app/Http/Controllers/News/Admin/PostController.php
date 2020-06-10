<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Generic\AdminViewAuthController;
use App\Http\Requests\News\PostUpdateRequest;
use App\Repositories\News\CategoryRepository;
use App\Repositories\News\PostRepository;
use Illuminate\Http\Request;

class PostController extends AdminViewAuthController
{
    private $postRepository;
    private $categoryRepository;

    public function __construct(
        PostRepository $postRepository,
        CategoryRepository $categoryRepository
    )
    {
        parent::__construct();

        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $models = $this->postRepository->getModelsWithPaginate(30);

        return view('news.admin.posts.index', compact('models'));
    }

    public function create()
    {
        $model = $this->postRepository->getNewModel();
        $categoryList = $this->categoryRepository->getModelsForSelectField();

        return view('news.admin.posts.create', compact('model', 'categoryList'));
    }

    public function store(PostUpdateRequest $request)
    {
        $data = $request->input();
        $model = $this->postRepository->createNewModel($data);

        if($model->exists) {
            return redirect()
                ->route('news.admin.posts.edit', $model->id)
                ->with(['success' => "Post created!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while creating"])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $model = $this->postRepository->getModelForEdit($id);
        if(empty($model)) {
            abort(404);
        }

        $categoryList = $this->categoryRepository->getModelsForSelectField();

        return view('news.admin.posts.edit', compact('model', 'categoryList'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $model = $this->postRepository->getModelForUpdate($id);

        if(empty($model)) {
            return back()
                ->withErrors(['msg' => "Post with ID equal {$id} not found"])
                ->withInput();
        }

        $data = $request->input();

        $result = $model
            ->fill($data)
            ->save();

        if($result) {
            return redirect()
                ->route('news.admin.posts.edit', $model->id)
                ->with(['success' => "Post saved!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while saving"])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $model = $this->postRepository->getModelForDelete($id);

        if(empty($model)) {
            return back()
                ->withErrors(['msg' => "Post with ID equal {$id} not found"])
                ->withInput();
        }

        $result = $model->delete();

        if($result) {
            return redirect()
                ->route('news.admin.posts.index')
                ->with(['success' => "Post {$id} deleted!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Error while deleting"])
                ->withInput();
        }
    }
}
