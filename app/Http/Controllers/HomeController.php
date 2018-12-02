<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\User;

class HomeController extends ApiController
{
    
	
	
	public function HomePanel(){
		
		return view('admin.admin');
	}
		
}
