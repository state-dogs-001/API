<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PersonnelController;

class Personnel extends Model
{
    protected $primaryKey = 'personnelId'; //ตัวชี้ column
    protected $table = 'personnel';     //ตัวชี้table
    protected $guarded = ['personnelId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
