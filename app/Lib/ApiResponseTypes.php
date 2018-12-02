<?php

namespace App\Lib;


trait ApiResponseTypes
{
    /**
     * Send response with specific status code
     * @param $data
     * @param $httpStatusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function Content($data, $httpStatusCode)
    {
        return response()->json(["data" => $data], $httpStatusCode);
    }

    /**
     * 200: OK.
     * The standard success code and default option.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function Ok($data){
        return $this->Content($data, HttpStatusCodes::OK);
    }

    /**
     * 201: Object created.
     * Useful for the store actions.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function ObjectCreated($data){
        return $this->Content($data, HttpStatusCodes::OBJECT_CREATED);
    }

    /**
     * 204: No content.
     * When an action was executed successfully, but there is no content to return.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function NoContent(){
        return $this->Content(null, HttpStatusCodes::NO_CONTENT);
    }

    /**
     * 206: Partial content.
     * Useful when you have to return a paginated list of resources.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function PartialContent($data){
        return $this->Content($data, HttpStatusCodes::PARTIAL_CONTENT);
    }

    /**
     * 400: Bad request.
     * The standard option for requests that fail to pass validation.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function BadRequest($data){
        return $this->Content($data, HttpStatusCodes::BAD_REQUEST);
    }

    /**
     * 401: Unauthorized.
     * The user needs to be authenticated.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Unauthorized(){
        return $this->Content("Unauthorized", HttpStatusCodes::UNAUTHORIZED);
    }

    /**
     * 403: Forbidden.
     * The user is authenticated, but does not have the permissions to perform an action.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Forbidden(){
        return $this->Content("Forbidden", HttpStatusCodes::FORBIDDEN);
    }

    /**
     * 404: Not found.
     * This will be returned automatically by Laravel when the resource is not found.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function NotFound(){
        return $this->Content("Resource not found", HttpStatusCodes::NOT_FOUND);
    }

    /**
     * 500: Internal server error.
     * Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function InternalServerError(){
        return $this->Content("Internal server error", HttpStatusCodes::INTERNAL_SERVER_ERROR);
    }

    /**
     * 503: Service unavailable.
     * Pretty self explanatory, but also another code that is not going to be returned explicitly by the application.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ServiceUnavailable(){
        return $this->Content("Service unavailable", HttpStatusCodes::SERVICE_UNAVAILABLE);
    }
}
