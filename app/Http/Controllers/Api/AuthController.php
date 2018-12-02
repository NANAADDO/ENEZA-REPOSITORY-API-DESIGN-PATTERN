<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends ApiController
{
   
    public function getToken(Request $request){
		
		if(!$request->header('Authorization') || !$request->header('authorization')){
		$res=[
                    'status'=>401,
                    'response' => 'UnAuthorized',
                    'message' => 'Authorization Header not set',
                ];

				 return response()->json($res,$res['status']);

		}

		if($request->header('Authorization') != 'Basic Z3JleTpwYXJyb3Q='){
		$res=[
                    'status'=>401,
                    'response' => 'UnAuthorized',
                    'message' => 'Wrong Authorization Key',
                ];

				 return response()->json($res,$res['status']);
		}

      if(Auth::attempt(['email'=>request('email'), 'password'=> request('password'
	 )])){

		 $user = Auth::user();
		 $success['token'] = $user->createToken('MyApp')->accessToken;

		$res=[
            'status'=>200,
            'response' => 'success',
            'token' => $success,

        ];

        return response()->json($res,$res['status']);
    }


	 else{
		  $res=[
                    'status'=>403,
                    'response' => 'error',
                    'message' => 'Invalid Credential Provided',
                ];
                return response()->json($res,$res['status']);


	 }
		
	 
      
	}
    public function username()
    {
        $login = request()->input('bpay_api_id');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'bpay_api_id' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function password()
    {
        $login = request()->input('bpay_api_key');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'bpay_api_key' : 'password';
        request()->merge([$field => $login]);
        return $field;
    }

}
