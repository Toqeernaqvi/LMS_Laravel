<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
 
    protected $table = 'organizations';
    protected $fillable = ['title','shortName','description','status','flag'];
}
