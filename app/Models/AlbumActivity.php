<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AlbumActivityController;

class AlbumActivity extends Model
{
    protected $primaryKey = 'alumnId'; //ตัวชี้ column
    protected $table = 'album_activity';     //ตัวชี้table
    protected $guarded = ['alumnId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
