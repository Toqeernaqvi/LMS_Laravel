<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'users_info';
    protected $fillable = ['first_name','last_name','father_name','cnic','dob','email','password','phone','address','account_id',
    'organization_id','branch_id','country_id','state_id','city_id','area_id','status','flag'];
    
}
