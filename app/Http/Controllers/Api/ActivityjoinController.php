<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activityjoin;

class ActivityjoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activityjoin = Activityjoin::all();
        return response()->json($activityjoin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameTh' => 'required',
            'surnameTh' => 'required',
            'Email' => 'required', 
            'studentCode' => 'required', 
            'Activity_Start' => 'required', 
            'Status' => 'required', 
            'Activity_Title' => 'required', 
        ]);
        return Activityjoin::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Activityjoin::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Status' => 'required',
        ]);
        $Activityjoin = Activityjoin::find($id);
        $Activityjoin->update($request->all());
        return response()->json($Activityjoin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Activityjoin::destroy($id);
    }

    public function search($Email)
    {
        return Activityjoin::where("Email","like","%".$Email."%")->get();
    }
    public function search1($Activity_Title)
    {
        return Activityjoin::where("Activity_Title","like","%".$Activity_Title."%")->get();
    }
}
