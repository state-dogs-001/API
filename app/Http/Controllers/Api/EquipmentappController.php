<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipmentapp;

class EquipmentappController extends Controller
{
    public function index()
    {
        $equipmentapp = Equipmentapp::all();
        return response()->json($equipmentapp);
    }
}
