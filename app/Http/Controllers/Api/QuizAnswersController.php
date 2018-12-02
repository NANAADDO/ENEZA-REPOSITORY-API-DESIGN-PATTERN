<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuizAnswersRequest;
use App\Repositories\Contracts\QuizAnswersRepository;


class QuizAnswersController extends Controller
{
    protected  $model;

    public function __construct(QuizAnswersRepository $model){
        $this->model = $model;
    }

    public function index(){

        return $this->model->getAll();
    }

    public function store(QuizAnswersRequest $request){
        return $this->model->create($request->all());

    }
    public function show($id){
        return $this->model->getById($id);

    }

    public function update(QuizAnswersRequest $request, $id){
        return $this->model->update($id,$request->all());

    }
    public function destroy($id){
        return $this->model->delete($id);
    }
}
