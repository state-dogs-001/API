<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use Image;


class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complain = Complain::all();
        return response()->json($complain);
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
            'Complain_Detail' => 'required',
            'Complain_Date' => 'required',
            //'Complain_Picture' => 'required',
            'Complain_Title' => 'required'
        ]);
        $data_Complain = array(
            'Complain_Detail' => $request->input('Complain_Detail'),
            'Complain_Date' => $request->input('Complain_Date'),
            'Complain_Title' => $request->input('Complain_Title'),
        );
        $Complain_Picture = $request->file('Complain_Picture');
        if(!empty($Complain_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "Complain".time().".".$Complain_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/Complain/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Complain_Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/Complain/original');
            $Complain_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_Complain['Complain_Picture'] = url('/').'/images/Complain/thumbnail/'.$file_name;
            }else{
            $data_Complain['Complain_Picture'] = url('/').'/images/Complain/thumbnail/no_img.jpg';
            }
            return Complain::create($data_Complain);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Complain::find($id);

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
        return Complain::destroy($id);
    }
    

}
