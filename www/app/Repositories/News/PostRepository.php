<?php
declare(strict_types=1);

namespace App\Repositories\News;

use App\Models\News\PostInterface;

class PostRepository extends \App\Repositories\GenericRepository
{
    protected function getModelClass()
    {
        return \App\Models\News\Post::class;
    }

    /**
     * @param null $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getModelsWithPaginate($perPage = null)
    {
        $columns = [
            PostInterface::ATTR_ID,
            PostInterface::ATTR_TITLE,
            PostInterface::ATTR_EXCERPT,
            PostInterface::ATTR_DESCRIPTION,
            PostInterface::ATTR_CATEGORY_ID,
            PostInterface::ATTR_AUTHOR_ID,
            PostInterface::ATTR_IS_PUBLISHED,
            PostInterface::ATTR_PUBLISHED_AT,
        ];

        $result = $this->startCondition()
            ->select($columns)
            ->with([
                'category' => function($query) {
                    $query->select(['id', 'title']);
                },
                'author' => function($query) {
                    $query->select(['id', 'name']);
                }
            ])

            ->orderBy(PostInterface::ATTR_ID, 'desc')
            ->paginate($perPage);

        return $result;
    }

    public function getNewModel()
    {
        return $this->startCondition();
    }

    public function createNewModel($data = null)
    {
        return $this->startCondition()::create($data);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModelForEdit(int $id)
    {
        return $this->startCondition()->find($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModelForUpdate(int $id)
    {
        return $this->getModelForEdit($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModelForDelete(int $id)
    {
        return $this->getModelForEdit($id);
    }
}
