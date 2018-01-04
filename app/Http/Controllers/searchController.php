<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;
class searchController extends Controller
{
    public function search() {
    	if(Input::has('name')) {
    		$user=User::where('id','=',Input::get('name'))->get();
    		if($user->count()>0) {
                return view('components.search_result',['users'=>$user]);   
    		} 
    	}
    }
}
