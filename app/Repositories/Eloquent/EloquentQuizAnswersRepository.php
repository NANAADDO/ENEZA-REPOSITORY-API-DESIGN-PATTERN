<?php

namespace App\Repositories\Eloquent;


use App\Models\QuizAnswers;
use App\Repositories\Contracts\QuizAnswersRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentQuizAnswersRepository extends AbstractRepository implements QuizAnswersRepository
{
    protected $model;
    public function __construct(QuizAnswers $model)
    {
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->findOrFail($id);
    }
    public function create(array $attributes){
        return $this->model->create($attributes);

    }
    public function update($id,array $attributes){
        $update = $this->model->findorfail($id);
        $update->update($attributes);
        return $update;

    }
    public function delete($id){
        $del = $this->model->findorfail($id);
        $del->delete();
        return response()->json(null,204);
    }
}
