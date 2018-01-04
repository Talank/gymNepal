<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
     protected $fillable=['user_id','phone','date','temporay_address','permant_address','occupation'];
}
