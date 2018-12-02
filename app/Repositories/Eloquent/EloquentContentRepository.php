<?php

namespace App\Repositories\Eloquent;
use App\Models\Content;
use App\Repositories\Contracts\ContentRepository;
use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentContentRepository extends AbstractRepository implements ContentRepository
{
    protected $model;
    public function __construct(Content $model)
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

    public function getContentBySubjectId($id){
        return $this->model->with('subject')->where('subject_id',$id)->where('content_type',1)->first();

    }
    public function getQuizContentBySubjectId($id){
        return $this->model->with('answers')->where('subject_id',$id)->where('content_type',2)->get();

    }
    public function __call($method,$args)
    {
        return call_user_func_array([$this->model,$method],$args);
    }
}
