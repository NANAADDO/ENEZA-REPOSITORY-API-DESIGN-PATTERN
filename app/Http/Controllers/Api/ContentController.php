<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Repositories\Contracts\ContentRepository;


class ContentController extends Controller
{
    protected  $model;

    public function __construct(ContentRepository $model){
        $this->model = $model;
    }

    public function index(){

        return $this->model->getAll();
    }

    public function store(ContentRequest $request){
        return $this->model->create($request->all());

    }
    public function show($id){
        return $this->model->getById($id);

    }

    public function update(ContentRequest $request, $id){
        return $this->model->update($id,$request->all());

    }
    public function destroy($id){
        return $this->model->delete($id);
    }

    public function SubjectContent($id){
        return $this->model->getContentBySubjectId($id);
    }
    public function SubjectQuizContent($id){
        return $this->model->getQuizContentBySubjectId($id);
    }
}
