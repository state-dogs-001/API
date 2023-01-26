<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SubjectController;

class Subject extends Model
{
    use HasFactory;
    protected $primaryKey = 'subjectId'; //ตัวชี้ column
    protected $table = 'subject';     //ตัวชี้table
    protected $guarded = ['subjectId'];  //post
    public $timestamps = false; // no timestamps
}
