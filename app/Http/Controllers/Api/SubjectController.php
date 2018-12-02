<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Repositories\Contracts\SubjectRepository;

class SubjectController extends Controller
{
    protected  $subject;

    public function __construct(SubjectRepository $model){

        $this->subject = $model;
    }

    public function index(){

        return $this->subject->getAll();
    }

    public function store(SubjectRequest $request){
        return $this->subject->create($request->all());

    }
    public function show($id){
        return $this->subject->getById($id);

    }

    public function update(SubjectRequest $request, $id){
        return $this->subject->update($id,$request->all());

    }
    public function destroy($id){
        return $this->subject->delete($id);
    }

    public function CourseSubject($id){
        return $this->subject->getSubjectByCourseId($id);
    }
}
