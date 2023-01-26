<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CV;


class CvController extends Controller
{
    public function index()
    {
        $cv = CV::all();
        return response()->json($cv);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            
            'Bio_Personnel' => 'required',
            'Experience' => 'required',
            'Skill' => 'required',
            'Portfolio' => 'required',
            'BachelorDegree' => 'required',
            'MastersDegree' => 'required',
            'DoctoralDegree' => 'required',
            'citizenId' => 'required',
            'expertise' => 'required',

        ]);
        return CV::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CV::find($id);
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
        $cv = CV::find($id);
        $cv->update($request->all());
        return $cv;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return CV::destroy($id);
    }
    public function search($citizenId)
    {
        return CV::where("citizenId","like","%".$citizenId."%")->get();
    }
}
