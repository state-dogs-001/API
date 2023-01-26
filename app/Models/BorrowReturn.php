<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BorrowReturnController;


class BorrowReturn extends Model
{
    protected $primaryKey = 'borrow_returnId'; //ตัวชี้ column
    protected $table = 'borrow_return';     //ตัวชี้table
    protected $guarded = ['borrow_returnId'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
