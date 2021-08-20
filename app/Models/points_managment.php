<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class points_managment extends Model
{
    protected $table = 'points_managment';
    protected $fillable = ['user_id','transaction_id','reward_id','points','type','status','flag'];
    use HasFactory;
}
