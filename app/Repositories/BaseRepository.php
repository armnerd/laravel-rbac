<?php

namespace App\Repositories;

abstract class BaseRepository{
    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * 注入
     * @return Model|mixed
     * @throws GeneralException
     */
    public function makeModel()
    {
        $model = app()->make($this->model());

//        todo 异常抛出
//        if (!$model instanceof Model) {
//            throw new GeneralException("Class {$this->model()} must be an instance of ".Model::class);
//        }

        return $this->model = $model;
    }
}
