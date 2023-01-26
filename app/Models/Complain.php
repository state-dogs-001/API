<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ComplainController;


class Complain extends Model
{
    protected $primaryKey = 'complainId'; //ตัวชี้ column
    protected $table = 'complain_csmju';     //ตัวชี้table
    protected $guarded = ['complainId'];  //post
    public $timestamps = false; // no timestamps

    use HasFactory;
}
