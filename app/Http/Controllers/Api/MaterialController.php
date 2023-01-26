<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $material = Material::all();
        return response()->json($material);
    }
    public function store(Request $request)
    {
        $request->validate([
            'Material_Name' => 'required',
            'Material_Quantity' => 'required',
            'Material_Detail' => 'required',
        ]);
        return Material::create($request->all());
    }
    public function show($id)
    {
        return Material::find($id);
    }
    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $material->update($request->all());
        return $material;
    }
    public function destroy($id)
    {
        return Material::destroy($id);
    }
    public function search($Material_Name)
    {
        return Material::where("Material_Name","like","%".$Material_Name."%")->get();
    }
}
