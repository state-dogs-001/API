<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowReturn;

class BorrowReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowreturn = BorrowReturn::all();
        return response()->json($borrowreturn);
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
            'Equipment_Name' => 'required',
            'Borrow_Date' => 'required',
            'Borrow_Details' => 'required',
            'Return_Date' => 'required',
            'Status' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required',
        ]);
        return BorrowReturn::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BorrowReturn::find($id);
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
        $borrowreturn = BorrowReturn::find($id);
        $borrowreturn->update($request->all());
        return response()->json($borrowreturn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return BorrowReturn::destroy($id);

    }
    public function search($Email)
    {
        return BorrowReturn::where("Email","like","%".$Email."%")->get();
    }
}
