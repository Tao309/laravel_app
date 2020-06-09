<?php
declare(strict_types=1);

namespace App\Repositories;

abstract class GenericRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass()::make();
    }

    abstract protected function getModelClass();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function startCondition()
    {
        return clone $this->model;
    }
}
