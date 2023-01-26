<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookClassroom;

class BookClassroomController extends Controller
{
    
    public function index()
    {
        $bookclassroom = BookClassroom::all();
        return response()->json($bookclassroom);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'Classroom_Name' => 'required',
            'Book_TimeStart' => 'required',
            'Book_TimeEnd' => 'required',
            'Book_Date' => 'required',
            'Status_Book' => 'required',
            'Book_Detail' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required',
            'StudentCode' => 'required',
            'Adviser' => 'required',
        ]);
        return BookClassroom::create($request->all());
    }

    public function show($id)
    {
        return BookClassroom::find($id);
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
            'Status_Book' => 'required',
        ]);
        $bookclassroom = BookClassroom::find($id);
        $bookclassroom->update($request->all());
        return response()->json($bookclassroom);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return BookClassroom::destroy($id);
    }
    public function search($Email)
    {
        return BookClassroom::where("Email","like","%".$Email."%")->get();
    }
}
