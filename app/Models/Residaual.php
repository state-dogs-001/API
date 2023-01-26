<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ResidaualController;

class Residaual extends Model
{
    protected $primaryKey = 'Id'; //ตัวชี้ column
    protected $table = 'residaual_subject';     //ตัวชี้table
    protected $guarded = ['Id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
