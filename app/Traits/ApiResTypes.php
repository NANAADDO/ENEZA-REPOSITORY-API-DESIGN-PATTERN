<?php
/**
 * Created by PhpStorm.
 * User: APPUSER3
 * Date: 10/8/2018
 * Time: 11:49 PM
 */

namespace App\Traits;
use App\Constants\StatusCodes;

trait ApiResTypes
{
    /**
     * Send response with specific status code
     * @param $data
     * @param $httpStatusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function SuccessContent($data, $httpStatusCode)
    {
        return response()->json(["data" => $data,"Success"=>true,"statuscode"=>$httpStatusCode], $httpStatusCode);
    }

  public function FailedContent($data, $httpStatusCode)
    {
        return response()->json(["data" => $data,"Success"=>false,"statuscode"=>$httpStatusCode], $httpStatusCode);
    }

    /**
     * 200: OK.
     * The standard success code and default option.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function Ok($data){
        return $this->SuccessContent($data, StatusCodes::OK);
    }

    /**
     * 201: Object created.
     * Useful for the store actions.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function ObjectCreated($data){
        return $this->SuccessContent($data, StatusCodes::OBJECT_CREATED);
    }

    /**
     * 204: No content.
     * When an action was executed successfully, but there is no content to return.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function NoContent(){
        return $this->FailedContent(null, StatusCodes::NO_CONTENT);
    }

    /**
     * 206: Partial content.
     * Useful when you have to return a paginated list of resources.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function PartialContent($data){
        return $this->FailedContent($data, StatusCodes::PARTIAL_CONTENT);
    }

    /**
     * 400: Bad request.
     * The standard option for requests that fail to pass validation.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function BadRequest($data){
        return $this->FailedContent($data, StatusCodes::BAD_REQUEST);
    }

 public function ValidationError($data){
	 
        return $this->FailedContent($data, StatusCodes::BAD_REQUEST);
    }
    /**
     * 401: Unauthorized.
     * The user needs to be authenticated.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Unauthorized(){
        return $this->FailedContent("Unauthorized", StatusCodes::UNAUTHORIZED);
    }

    /**
     * 403: Forbidden.
     * The user is authenticated, but does not have the permissions to perform an action.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Forbidden(){
        return $this->FailedContent("Forbidden", StatusCodes::FORBIDDEN);
    }

    /**
     * 404: Not found.
     * This will be returned automatically by Laravel when the resource is not found.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function NotFound(){
        return $this->FailedContent("Resource not found", StatusCodes::NOT_FOUND);
    }

    /**
     * 500: Internal server error.
     * Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function InternalServerError(){
        return $this->FailedContent("Internal server error", StatusCodes::INTERNAL_SERVER_ERROR);
    }

    /**
     * 503: Service unavailable.
     * Pretty self explanatory, but also another code that is not going to be returned explicitly by the application.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ServiceUnavailable(){
        return $this->FailedContent("Service unavailable", StatusCodes::SERVICE_UNAVAILABLE);
    }

}