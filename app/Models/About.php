<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AboutController;

class About extends Model
{
    protected $primaryKey = 'AboutId'; //ตัวชี้ column
    protected $table = 'about_csmju';     //ตัวชี้table
    protected $guarded = ['AboutId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
