<?php

namespace App\Http\Controllers;

use App\User;
use App\duebalance;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function renew($id) {
    	session(['id'=>$id]);
    	$user=User::find($id);
    	$attend=$user->attendance()->count();
    	$due=$user->duebalance()->value('due');
    	if($due==null)
    		$preDueAmount=0;
    	else
    		$preDueAmount=$due;
    	return view('components.renew',['id'=>$id,'attend'=>$attend,'data'=>$user,'preDueAmount'=>$preDueAmount]);	
    }
    public function update(Request $request) {
    	$id=session('id');
    	$user=User::find($id);
    	$amount=$request->input('amount');
    	$totalDue=$request->input('preDueAmount')+$request->input('dueAmount');
    	$due=$user->duebalance()->value('due');
    	$date=date_create($user->value('duedate'));
    	$today=date_create(date('y-m-d',time()));
    	if(date_diff($date,$today)->format('%R%a')>0)
    		$date=$today;
    	if($due!=null) {
    		 if($request->has('cutPrevious')) {
    			$amount+=$due;
    		}
    	}
    	if($request->input('date')!=0) {
    		date_add($date,date_interval_create_from_date_string($request->input['date']." months"));
    		$date=date_format($date,'y-m-d');
    		$user->update(['duedate'=>$date,'firstname'=>$request->input('firstname'),'lastname'=>$request->input('lastname')]);
    	}
    	if($totalDue==0) {
    		$value=duebalance::destroy($id);
    	} else {
            $duebalance=$user->duebalance;
    		if($due==null) {
    			$duebalance=new duebalance;
    			$duebalance->due=$totalDue;
    		} else {
    			$duebalance->due=$totalDue;
    		}
            $duebalance->user_id=$id;
            $duebalance->save();
    	}
        return view('components.bill',[
            'fristname'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            'user_id'=>$id,
            'due'=>$totalDue,
            'amount'=>$amount,
            'discount'=>$request->input('discount'),
            'tender'=>$request->input('tender')
        ]);

    }
}
