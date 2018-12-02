<?php

namespace App\Repositories\Eloquent;

use App\Models\Subject;
use App\Repositories\Contracts\SubjectRepository;
use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentSubjectRepository extends AbstractRepository implements SubjectRepository
{
    protected $model;
    public function __construct(Subject $model)
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


    public function getSubjectByCourseId($id){
        return $this->model->with('course')->where('course_id',$id)->get();

    }
    public function __call($method,$args)
    {
        return call_user_func_array([$this->model,$method],$args);
    }
}
