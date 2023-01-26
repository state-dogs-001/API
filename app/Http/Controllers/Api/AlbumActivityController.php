<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlbumActivity;
use Image;

class AlbumActivityController extends Controller
{

    public function index()
    {
        $albumactivity = AlbumActivity::all();
        return response()->json($albumactivity);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Titile' => 'required',
            'Detail' => 'required',
            'Date' => 'required',
           
        ]);
        $data_Pic = array(
            'Titile' => $request->input('Titile'),
            'Detail' => $request->input('Detail'),
            'Date' => $request->input('Date'),  
        );
        $Pic1 = $request->file('Pic1');
        $Pic2 = $request->file('Pic2');
        $Pic3 = $request->file('Pic3');
        $Pic4 = $request->file('Pic4');
        $Pic5 = $request->file('Pic5');
        $Pic6 = $request->file('Pic6');
        $Pic7 = $request->file('Pic7');
        $Pic8 = $request->file('Pic8');
        $Pic9 = $request->file('Pic9');
        $Pic10 = $request->file('Pic10');
   
        /// Pic  1 ///
        if(!empty($Pic1)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "activitypic1_".time().".".$Pic1->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/activityalbum/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Pic1->getRealPath());
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/activityalbum/original');
            $Pic1->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_Pic['Pic1'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
            }

        /// Pic  2 ///
        if(!empty($Pic2)){
                // อัพโหลดรูปภาพ
                // เปลี่ยนชื่อรูปที่ได้
            $file_name = "activityPic2_".time().".".$Pic2->getClientOriginalExtension();
                // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
                /* $imgWidth = 400;
                $imgHeight = 400; */
            $folderupload = public_path('/images/activityalbum/thumbnail');
            $path = $folderupload."/".$file_name;
                // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Pic2->getRealPath());
            $img->save($path);
                // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/activityalbum/original');
            $Pic2->move($destinationPath, $file_name);
                // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_Pic['Pic2'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
            }
        /// Pic  3 ///
        if(!empty($Pic3)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic3_".time().".".$Pic3->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic3->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic3->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic3'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

        /// Pic  4 ///
        if(!empty($Pic4)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic4_".time().".".$Pic4->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic4->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic4->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic4'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

        /// Pic  5 ///
        if(!empty($Pic5)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic5_".time().".".$Pic5->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic5->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic5->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic5'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

         /// Pic  6 ///
         if(!empty($Pic6)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic6_".time().".".$Pic6->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic6->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic6->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic6'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

        /// Pic  7 ///
        if(!empty($Pic7)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic7_".time().".".$Pic7->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic7->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic7->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic7'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

        /// Pic  8 ///
        if(!empty($Pic8)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic8_".time().".".$Pic8->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic8->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic8->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic8'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

        /// Pic  9 ///
        if(!empty($Pic9)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic9_".time().".".$Pic9->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic9->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic9->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic9'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

        /// Pic  10 ///
        if(!empty($Pic10)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
        $file_name = "activityPic10_".time().".".$Pic10->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
        $folderupload = public_path('/images/activityalbum/thumbnail');
        $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
        $img = Image::make($Pic10->getRealPath());
        $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
        $destinationPath = public_path('/images/activityalbum/original');
        $Pic10->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
        $data_Pic['Pic10'] = url('/').'/images/activityalbum/thumbnail/'.$file_name;
        }

            return AlbumActivity::create($data_Pic);
    }

    
    public function show($id)
    {
        return AlbumActivity::find($id);
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
        return AlbumActivity::destroy($id);
    }
}
