<?php

namespace App\Http\Controllers;
use App\User;
use App\information;
use App\pending;
use App\duebalance;
use App\status;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function registerCheck(Request $request) {
    	$data=$request->validate([
    		'firstname'=>'required|max:15',
    		'lastname'=>'required|max:15',
    		'phone'=>'required|min:10',
    		'dob'=>'required',
    		'temp_address'=>'required',
    		'perm_address'=>'required',
    		'issue'=>'required',
    		'occupation'=>'required'
    	]);
 		$date=date_create(date('y-m-d'));
 		date_add($date,date_interval_create_from_date_string($request->input('plan').' months'));
 		$date=date_format($date,'y-m-d');
 		$id=User::create(['firstname'=>$request->input('firstname'),
 			'lastname'=>$request->input('lastname'),
 			'duedate'=>$date,
 			'picture'=>'xxx.jpg',
 			'issue_date'=>$request->input('issue')
 		])->id;
 		information::create(['user_id'=>$id,'phone'=>$request->input('phone'),
 			'date'=>$request->input('dob'),
 			'temporay_address'=>$request->input('temp_address'),
 			'permant_address'=>$request->input('perm_address'),
 			'occupation'=>$request->input('occupation')
 		]);
 		status::create(['user_id'=>$id,'status'=>1]);
        $count=User::count();
        $pending=pending::count();
        $active=$count-$pending;
        $dueNo=duebalance::count();
        return view('layouts.dashboard',compact('count','pending','active','dueNo'));
    }
}
