<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
   
    public function index()
    {
        $about = About::all();
        return response()->json($about);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Topic' => 'required',
            'Detail' => 'required',
            'Update_Date' => 'required',
        ]); 
        $data_about = array(
            'Topic' => $request->input('Topic'),
            'Detail' => $request->input('Detail'),
            'Update_Date' => $request->input('Update_Date'),
        );
        $Picture = $request->file('Picture');
        if(!empty($Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "about_".time().".".$Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/about/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/about/original');
            $Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_about['Picture'] = url('/').'/images/about/thumbnail/'.$file_name;
            }else{
            $data_about['Picture'] = url('/').'/images/about/thumbnail/no_img.jpg';
            }
            return about::create($data_about);

        
    }

    
    public function show($id)
    {
        return About::find($id);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'Topic' => 'required',
            'Detail' => 'required',
            'Update_Date' => 'required',
        ]); 
        $data_about = array(
            'Topic' => $request->input('Topic'),
            'Detail' => $request->input('Detail'),
            'Update_Date' => $request->input('Update_Date'),
        );
        $Picture = $request->file('Picture');
        if(!empty($Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "about_".time().".".$Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/about/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/about/original');
            $Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_about['Picture'] = url('/').'/images/about/thumbnail/'.$file_name;
        }
            $about = About::find($id);
            $about->update($data_about);
            return $about;   
    }

    
    public function destroy($id)
    {
        return About::destroy($id);
    }
    public function search($Topic)
    {
        return About::where("Topic","like","%".$Topic."%")->get();
    }

}
