<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'studentId'; //ตัวชี้ column
    protected $table = 'student';     //ตัวชี้table
    protected $guarded = ['studentId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
