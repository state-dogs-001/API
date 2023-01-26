<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personnel;
use Image;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnel = Personnel::all();
        return response()->json($personnel);
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
            'citizenId' => 'required|min:13',
            'titleName' => 'required',
            'titlePosition' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'titleNameEn' => 'required',
            'fistNameEn' => 'required',
            'lastNameEn' => 'required',
            'gender' => 'required',
            'personnelType' => 'required',
            'positionType' => 'required',
            'position' => 'required',
            'faculty' => 'required',
            'educationLevel' => 'required',
            'titleEducation' => 'required',
            'education' => 'required',
            'major' => 'required',
            'university' => 'required',
            'e_mail' => 'required',
            'portfolioResearch' => 'required',
            'adminPosition' => 'required',
            'phoneNumber' => 'required',
            'Type' => 'required',
        ]);
        $data_picture = array(
            'citizenId' => $request->input('citizenId'),
            'titleName' => $request->input('titleName'),
            'titlePosition' => $request->input('titlePosition'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'titleNameEn' => $request->input('titleNameEn'),
            'fistNameEn' => $request->input('fistNameEn'),
            'lastNameEn' => $request->input('lastNameEn'),
            'gender' => $request->input('gender'),
            'personnelType' => $request->input('personnelType'),
            'positionType' => $request->input('positionType'),
            'position' => $request->input('position'),
            'faculty' => $request->input('faculty'),
            'educationLevel' => $request->input('educationLevel'),
            'titleEducation' => $request->input('titleEducation'),
            'education' => $request->input('education'),
            'major' => $request->input('major'),
            'university' => $request->input('university'),
            'e_mail' => $request->input('e_mail'),
            'portfolioResearch' => $request->input('portfolioResearch'),
            'adminPosition' => $request->input('adminPosition'),
            'phoneNumber' => $request->input('phoneNumber'),
            'Type' => $request->input('Type'),

           
        );
        $personnelPhoto = $request->file('personnelPhoto');
        if(!empty($personnelPhoto)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "PersonnelPic_".time().".".$personnelPhoto->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/personnel/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($personnelPhoto->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/personnel/original');
            $personnelPhoto->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_picture['personnelPhoto'] = url('/').'/images/personnel/thumbnail/'.$file_name;
            }else{
            $data_picture['personnelPhoto'] = url('/').'/images/personnel/thumbnail/no_img.jpg';
            }
            return Personnel::create($data_picture);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Personnel::find($id);
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
            'citizenId' => 'required|min:13',
            'firstName' => 'required',
            'lastName' => 'required',
            'fistNameEn' => 'required',
            'lastNameEn' => 'required',
            'position' => 'required',
            'education' => 'required',
            'major' => 'required',
            'university' => 'required',
            'e_mail' => 'required',
            'adminPosition' => 'required',
            'phoneNumber' => 'required',

        ]);
        $data_picture = array(
            'citizenId' => $request->input('citizenId'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'fistNameEn' => $request->input('fistNameEn'),
            'lastNameEn' => $request->input('lastNameEn'),
            'position' => $request->input('position'),
            'education' => $request->input('education'),
            'major' => $request->input('major'),
            'university' => $request->input('university'),
            'e_mail' => $request->input('e_mail'),
            'adminPosition' => $request->input('adminPosition'),
            'phoneNumber' => $request->input('phoneNumber'),
        );
        $personnelPhoto = $request->file('personnelPhoto');
        if(!empty($personnelPhoto)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "PersonnelPic_".time().".".$personnelPhoto->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/personnel/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($personnelPhoto->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/personnel/original');
            $personnelPhoto->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_picture['personnelPhoto'] = url('/').'/images/personnel/thumbnail/'.$file_name;
        }
            $personnel = Personnel::find($id);
            $personnel->update($data_picture);
            return $personnel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Personnel::destroy($id);
    }
    public function search($Type)
    {
        return Personnel::where("Type","like","%".$Type."%")->get();
    }
    public function search1($citizenId)
    {
        return Personnel::where("citizenId","like","%".$citizenId."%")->get();
    }
}
