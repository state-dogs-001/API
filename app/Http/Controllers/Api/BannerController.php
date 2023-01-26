<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();;
        return response()->json($banner);
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
            'Banner_Date' => 'required',
            'Banner_Time' => 'required',
            'Banner_File' => 'required',
          
        ]);
        $data_banner = array(
            'Banner_Date' => $request->input('Banner_Date'),
            'Banner_Time' => $request->input('Banner_Time'),
        );
        $Banner_File = $request->file('Banner_File');
        if(!empty($Banner_File)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "Banner_".time().".".$Banner_File->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
           /*  $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/banner/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Banner_File->getRealPath());
            /* $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/banner/original');
            $Banner_File->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_banner['Banner_File'] = url('/').'/images/banner/thumbnail/'.$file_name;
            }else{
            $data_banner['Banner_File'] = url('/').'/images/banner/thumbnail/no_img.jpg';
            }
            return banner::create($data_banner);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Banner::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Banner::destroy($id);
    }
}
