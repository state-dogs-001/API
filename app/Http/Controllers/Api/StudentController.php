<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::paginate(50);
        return response()->json($student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'studentCode' => 'required',
            'nameTh' => 'required',
            'surnameTh' => 'required',
            'nameEn' => 'required',
            'surnameEn' => 'required',
            'EmailStudent' => 'required',
            'mobile' => 'required',
            'Address' => 'required',
        ]);
        
        $data_picture = array(
            'studentCode' => $request->input('studentCode'),
            'nameTh' => $request->input('nameTh'),
            'surnameTh' => $request->input('surnameTh'),
            'nameEn' => $request->input('nameEn'),
            'surnameEn' => $request->input('surnameEn'),
            'EmailStudent' => $request->input('EmailStudent'),
            'mobile' => $request->input('mobile'),
            'Address' => $request->input('Address'),
        );

        $PictureProfile = $request->file('PictureProfile');
        if(!empty($PictureProfile)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "StudentPic_".time().".".$PictureProfile->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/student/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($PictureProfile->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/student/original');
            $PictureProfile->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_picture['PictureProfile'] = url('/').'/images/student/thumbnail/'.$file_name;
            }else{
            $data_picture['PictureProfile'] = url('/').'/images/student/thumbnail/no_img.jpg';
            }
            return Student::create($data_picture);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
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
            'studentCode' => 'required',
            'nameTh' => 'required',
            'surnameTh' => 'required',
            'nameEn' => 'required',
            'surnameEn' => 'required',
            'EmailStudent' => 'required',
            'mobile' => 'required',
            'Address' => 'required',
           
        ]);
        $data_picture = array(
            'studentCode' => $request->input('studentCode'),
            'nameTh' => $request->input('nameTh'),
            'surnameTh' => $request->input('surnameTh'),
            'nameEn' => $request->input('nameEn'),
            'surnameEn' => $request->input('surnameEn'),
            'EmailStudent' => $request->input('EmailStudent'),
            'mobile' => $request->input('mobile'),
            'Address' => $request->input('Address'),
           
        );
        $PictureProfile = $request->file('PictureProfile');
        if(!empty($PictureProfile)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "StudentPic_".time().".".$PictureProfile->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/student/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($PictureProfile->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/student/original');
            $PictureProfile->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_picture['PictureProfile'] = url('/').'/images/student/thumbnail/'.$file_name;
            }

            $student = Student::find($id);
            $student->update($data_picture);
            return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Student::destroy($id);
    }
    public function search($studentCode)
    {
        return Student::where("studentCode","like","%".$studentCode."%")->paginate(50);
    }
}
