<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\Contracts\CourseRepository;
use Illuminate\Database\Eloquent\Model;
use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentCourseRepository  implements CourseRepository
{
    protected $model;
    public function __construct(Course $model)
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
