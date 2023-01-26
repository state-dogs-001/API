<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AlumniController;


class Alumni extends Model
{
    use HasFactory;
    protected $primaryKey = 'AlumniId'; //ตัวชี้ column
    protected $table = 'alumni_csmju';     //ตัวชี้table
    protected $guarded = ['AlumniId'];  //post
    public $timestamps = false; // no timestamps
}
