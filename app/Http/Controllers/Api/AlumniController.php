<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Image;


class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::paginate(12);;
        return response()->json($alumni);
    }
    public function store(Request $request){
        $request->validate([
            'Firstname_Alumni' => 'required',
            'Lastname_Alumni' => 'required',
            'StudentCode_Alumni' => 'required',
            'Workplace' => 'required',
            'Contact' => 'required',
            'Caption' => 'required',
            'Job_Title' => 'required',
            'Alumni_Picture' => 'required',
        ]);
        $data_Alumni = array(
            'Firstname_Alumni' => $request->input('Firstname_Alumni'),
            'Lastname_Alumni' => $request->input('Lastname_Alumni'),
            'StudentCode_Alumni' => $request->input('StudentCode_Alumni'),
            'Workplace' => $request->input('Workplace'),
            'Contact' => $request->input('Contact'),
            'Caption' => $request->input('Caption'),
            'Job_Title' => $request->input('Job_Title'),
        );
        $Alumni_Picture = $request->file('Alumni_Picture');
        if(!empty($Alumni_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "Alumni_".time().".".$Alumni_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            $imgWidth = 400;
            $imgHeight = 400;
            $folderupload = public_path('/images/Alumni/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Alumni_Picture->getRealPath());
            $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            });
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/Alumni/original');
            $Alumni_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_Alumni['Alumni_Picture'] = url('/').'/images/Alumni/thumbnail/'.$file_name;
            }else{
            $data_Alumni['Alumni_Picture'] = url('/').'/images/Alumni/thumbnail/no_img.jpg';
            }
            return Alumni::create($data_Alumni);
        
    }

    public function show($id)
    {
        return Alumni::find($id);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Firstname_Alumni' => 'required',
            'Lastname_Alumni' => 'required',
            'StudentCode_Alumni' => 'required',
            'Workplace' => 'required',
            'Contact' => 'required',
            'Caption' => 'required',
            'Job_Title' => 'required',
            'Alumni_Picture' => 'required',
        ]);
        $data_Alumni = array(
            'Firstname_Alumni' => $request->input('Firstname_Alumni'),
            'Lastname_Alumni' => $request->input('Lastname_Alumni'),
            'StudentCode_Alumni' => $request->input('StudentCode_Alumni'),
            'Workplace' => $request->input('Workplace'),
            'Contact' => $request->input('Contact'),
            'Caption' => $request->input('Caption'),
            'Job_Title' => $request->input('Job_Title'),
        );
        $Alumni_Picture = $request->file('Alumni_Picture');
        if(!empty($Alumni_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "Alumni_".time().".".$Alumni_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            $imgWidth = 400;
            $imgHeight = 400;
            $folderupload = public_path('/images/Alumni/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Alumni_Picture->getRealPath());
            $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            });
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/Alumni/original');
            $Alumni_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_Alumni['Alumni_Picture'] = url('/').'/images/Alumni/thumbnail/'.$file_name;
            }
            $alumni = Alumni::find($id);
            $alumni->update($data_Alumni);
            return $alumni;
        }

    public function destroy($id)
    {
        return Alumni::destroy($id);
    }
    public function search($Firstname_Alumni)
    {
        return Alumni::where("Firstname_Alumni","like","%".$Firstname_Alumni."%")->paginate(10);
    }
    public function search2($Workplace)
    {
        return Alumni::where("Workplace","like","%".$Workplace."%")->paginate(50);
    }
    
}

