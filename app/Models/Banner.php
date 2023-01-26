<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BannerController;

class Banner extends Model
{
    use HasFactory;
    protected $primaryKey = 'Banner_ID'; //ตัวชี้ column
    protected $table = 'banner';     //ตัวชี้table
    protected $guarded = ['Banner_ID'];  //post
    public $timestamps = false; // no timestamps
}
