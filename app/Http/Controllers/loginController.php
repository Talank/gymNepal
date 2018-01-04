<?php

namespace App\Http\Controllers;

use DummyFullModelClass;
use App\Admin;
use App\User;
use App\duebalance;
use App\pending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\lain  $lain
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    public function conform() {
        if(Input::has('username')&&Input::has('password')) {
            $admin=new Admin;
            $user=$admin->where('username','=',Input::get('username'))->firstorfail();
            if(Input::get('password')==$user->password) {
                $count=User::count();
                $pending=pending::count();
                $active=$count-$pending;
                $dueNo=duebalance::count();
                return view('layouts.dashboard',compact('count','pending','active','dueNo'));
            } 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\lain  $lain
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lain  $lain
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show( DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(DummyModelClass $DummyModelVariable)
    {
        //
    }
}
