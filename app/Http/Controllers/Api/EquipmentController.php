<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::paginate(25);
        return response()->json($equipment);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Equipment_Code' => 'required',
            'Equipment_Quantity' => 'required',
            'Equipment_Name' => 'required',
            'Equipment_Brand' => 'required',
            'Equipment_Serialnumber' => 'required',
            'Equipment_Date' => 'required',
            'Equipment_Room' => 'required',
            'Equipment_Users' => 'required',
            'Equipment_Caretaker' => 'required',
            'Equipment_Status' => 'required',
            'Equipment_Note' => 'required',
            'Equipment_Type' => 'required',
            'Equipment_Detail' => 'required',
           
        ]);
        return Equipment::create($request->all());
    }

    
    public function show($id)
    {
        return Equipment::find($id);
    }

    
    public function update(Request $request, $id)
    {
        $equipment = Equipment::find($id);
        $equipment->update($request->all());
        return $equipment;
    }

    
    public function destroy($id)
    {
        return Equipment::destroy($id);
    }
    public function search($Equipment_Name)
    {
        return Equipment::where("Equipment_Name","like","%".$Equipment_Name."%")
        ->paginate(15);
    }

    public function search1($Equipment_Code)
    {
        return Equipment::where("Equipment_Code","like","%".$Equipment_Code."%")
        ->paginate(15);
    }
}
