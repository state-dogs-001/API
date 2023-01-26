<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CheckLogin;

class CheckLoginController extends Controller
{
    public function index()
    {
        $chcklogin = CheckLogin::paginate(25);
        return response()->json($chcklogin);
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'Username' => 'required',
            'type' => 'required',
            'Date' => 'required',
            'Device' => 'required',

        ]);
        return CheckLogin::create($request->all());
    }

    
    public function show($id)
    {
        return CheckLogin::find($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return CheckLogin::destroy($id);
    }
    public function search($studentCode)
    {
        return CheckLogin::where("studentCode","like","%".$studentCode."%")
        ->paginate(25);
    }
}
