<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ClassroomController;

class Classroom extends Model
{
    protected $primaryKey = 'ClassroomId'; //ตัวชี้ column
    protected $table = 'classroom';     //ตัวชี้table
    protected $guarded = ['ClassroomId'];  //post
    public $timestamps = false; // no timestamps
   
    use HasFactory;
}
