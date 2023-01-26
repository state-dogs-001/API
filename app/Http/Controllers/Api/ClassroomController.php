<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use Image;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = Classroom::all();
        return response()->json($classroom);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'Classroom_Name' => 'required',
            'Classroom_Type' => 'required',
            'Classroom_Number' => 'required',
            'Classroom_sit' => 'required',
            'Classroom_Detail' => 'required',
        ]);
        $data_classroom = array(
            'Classroom_Name' => $request->input('Classroom_Name'),
            'Classroom_Type' => $request->input('Classroom_Type'),
            'Classroom_Number' => $request->input('Classroom_Number'),
            'Classroom_sit' => $request->input('Classroom_sit'),
            'Classroom_Detail' => $request->input('Classroom_Detail'),
        );
        $Classroom_Images = $request->file('Classroom_Images');
        if(!empty($Classroom_Images)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "classroom_".time().".".$Classroom_Images->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/classroom/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Classroom_Images->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/classroom/original');
            $Classroom_Images->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_classroom['Classroom_Images'] = url('/').'/images/classroom/thumbnail/'.$file_name;
            }else{
            $data_classroom['Classroom_Images'] = url('/').'/images/classroom/thumbnail/no_img.jpg';
            }
            return Classroom::create($data_classroom);
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Classroom::find($id);
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
            'Classroom_Name' => 'required',
            'Classroom_Type' => 'required',
            'Classroom_Number' => 'required',
            'Classroom_sit' => 'required',
            'Classroom_Detail' => 'required',
        ]);
        $data_classroom = array(
            'Classroom_Name' => $request->input('Classroom_Name'),
            'Classroom_Type' => $request->input('Classroom_Type'),
            'Classroom_Number' => $request->input('Classroom_Number'),
            'Classroom_sit' => $request->input('Classroom_sit'),
            'Classroom_Detail' => $request->input('Classroom_Detail'),
        );
        $Classroom_Images = $request->file('Classroom_Images');
        if(!empty($Classroom_Images)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "classroom_".time().".".$Classroom_Images->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/classroom/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Classroom_Images->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/classroom/original');
            $Classroom_Images->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_classroom['Classroom_Images'] = url('/').'/images/classroom/thumbnail/'.$file_name;
            }else{
            $data_classroom['Classroom_Images'] = url('/').'/images/classroom/thumbnail/no_img.jpg';
            }
            $classroom = Classroom::find($id);
            $classroom->update($data_classroom);
            return $classroom;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Classroom::destroy($id);
    }
    public function search($Classroom_Type)
    {
        return Classroom::where("Classroom_Type","like","%".$Classroom_Type."%")->get();
    }
}
