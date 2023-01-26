<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BookClassroomController;

class BookClassroom extends Model
{
    protected $primaryKey = 'book_classroomId'; //ตัวชี้ column
    protected $table = 'book_classroom';     //ตัวชี้table
    protected $guarded = ['book_classroomId'];  //post
    public $timestamps = false; // no timestamps
   
    use HasFactory;
}
