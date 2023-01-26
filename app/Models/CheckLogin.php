<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CheckLoginController;

class CheckLogin extends Model
{
    protected $primaryKey = 'LoginId'; //ตัวชี้ column
    protected $table = 'CheckLogin';     //ตัวชี้table
    protected $guarded = ['LoginId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
