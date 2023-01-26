<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
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
            'Subject_NameTh' => 'required',
            'Subject_NameEn' => 'required',
            'Subject_Code' => 'required',
            'Subject_Credit' => 'required',
            'Subject_Detail' => 'required',
            'Subject_Term' => 'required'

        ]);
        return Subject::create($request->all());
    }

    public function show($id)
    {
        return Subject::find($id);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->update($request->all());
        return $subject;
    }

    public function destroy($id)
    {
        return Subject::destroy($id);
    }

    public function search($Subject_Detail)
    {
        return Subject::where("Subject_Detail","like","%".$Subject_Detail."%")->get();
    }

    public function search1($Subject_Code)
    {
        return Subject::where("Subject_Code","like","%".$Subject_Code."%")->get();
    }

    public function search2($Subject_Term)
    {
        return Subject::where("Subject_Term","like","%".$Subject_Term."%")->get();
    }
}
