<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\NewsController;

class NewsApp extends Model
{
    use HasFactory;
    protected $primaryKey = 'newsId'; //ตัวชี้ column
    protected $table = 'news_csmju';     //ตัวชี้table
    protected $guarded = ['newsId'];  //post
    public $timestamps = false; // no timestamps

}
