<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ActivityController;

class Activity extends Model
{
    protected $primaryKey = 'activityId'; //ตัวชี้ column
    protected $table = 'activity';     //ตัวชี้table
    protected $guarded = ['activityId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
