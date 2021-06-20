<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    protected $table = 'cards';
    protected $fillable = ['id','title','shortName','description','joining_bonus','minimum_bonus','validaty','status','flag'];
}
