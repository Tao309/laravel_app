<?php
declare(strict_types=1);

namespace App\Repositories\News;

use App\Models\News\CategoryInterface;

class CategoryRepository extends \App\Repositories\GenericRepository
{
    protected function getModelClass()
    {
        return \App\Models\News\Category::class;
    }

    /**
     * @param null $perPage
     * @return @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getModelsWithPaginate($perPage = null)
    {
        $columns = [
            CategoryInterface::ATTR_ID,
            CategoryInterface::ATTR_TITLE,
            CategoryInterface::ATTR_PARENT_ID
        ];

        $result = $this->startCondition()
            ->select($columns)
            ->with([
                'parentCategory' => function($query) {
                    $query->select(['id', 'title']);
                },
            ])
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

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getModelsForSelectField()
    {
        $columns = ['id', 'title'];

        $result = $this
            ->startCondition()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }
}
