<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ActivityjoinController;

class Activityjoin extends Model
{
    protected $primaryKey = 'activityjoinId'; //ตัวชี้ column
    protected $table = 'activity_join';     //ตัวชี้table
    protected $guarded = ['activityjoinId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
