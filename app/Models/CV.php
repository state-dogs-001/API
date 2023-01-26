<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CvController;
class CV extends Model
{
    protected $primaryKey = 'cvId'; //ตัวชี้ column
    protected $table = 'cv_personnel';     //ตัวชี้table
    protected $guarded = ['cvId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
