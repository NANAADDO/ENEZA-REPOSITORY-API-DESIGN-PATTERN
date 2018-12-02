<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Models\Course;
use App\Repositories\Contracts\CourseRepository;

class CoursesController extends Controller
{

    protected  $course;

public function __construct(CourseRepository  $model){

$this->course = $model;
}

public function index(){

    return $this->course->getAll();
}

public function store(CoursesRequest $request){
    return $this->course->create($request->all());

}
    public function show($id){
        return $this->course->getById($id);

    }

    public function update(CoursesRequest $request, $id){
        return $this->course->update($id,$request->all());

    }
    public function destroy($id){
    return $this->course->delete($id);
    }
}

