<?php
declare(strict_types=1);

namespace App\Repositories\News;

class CategoryRepository extends \App\Repositories\GenericRepository
{
    protected function getModelClass()
    {
        return \App\Models\News\Category::class;
    }

    public function getModelsWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startCondition()
            ->select($columns)
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
