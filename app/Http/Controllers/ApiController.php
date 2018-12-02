<?php

namespace App\Http\Controllers;

use App\Lib\ApiResponseTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ApiResponseTypes;

    /**
     * This is used for validations
     * @var array
     */
    protected $validationRules = [];

    /**
     * Perform validations on request
     * @param $request
     */
    protected function validateRequest($request){
        $this->validate($request, $this->validationRules);
    }

    /**
     * Associated model
     * @var Model
     */
    protected $model;

    /**
     * Display a list of resources.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->model::all();

        return $this->Ok($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $this->model::create($request->all());

        return $this->ObjectCreated($data);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->model::findOrFail($id);

        return $this->Ok($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $this->validateRequest($request);
        $data->update($request->all());

        return $this->Ok($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();

        return $this->NoContent();
    }
}
