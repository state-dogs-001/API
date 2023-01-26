<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MaterialController;
class Material extends Model
{
    protected $primaryKey = 'Material_Id'; //ตัวชี้ column
    protected $table = 'material_csmju';     //ตัวชี้table
    protected $guarded = ['Material_Id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
