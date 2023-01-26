<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Residaual;

class ResidaualController extends Controller
{
    public function index()
    {
        $residaual = Residaual::all();
        return response()->json($residaual);
    }
    public function store(Request $request)
    {
        $request->validate([
            'Subject_Internal' => 'required',
            'Subject_External' => 'required',
            'Residaual_Detail' => 'required',
            'nameTh' => 'required',
            'surnameTh' => 'required',
            'EmailStudent' => 'required',
            'mobile' => 'required', 
            'studentCode' => 'required', 
            'Subject60' => 'required',
           
        ]);
        return Residaual::create($request->all());
    }
    public function show($id)
    {
        return Residaual::find($id);
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        return Residaual::destroy($id);
    }
}
