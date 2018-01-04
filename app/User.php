<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'firstname', 'lastname', 'duedate','issue_date','picture'
    ];

    public function information() {
        return $this->hasOne('App\information');
    }   
    public function status() {
        return $this->hasOne('App\status');
    }

    public function attendance() {
        return $this->hasMany('App\attendance');
    }

    public function duebalance() {
        return $this->hasOne('App\duebalance');
    }
}
