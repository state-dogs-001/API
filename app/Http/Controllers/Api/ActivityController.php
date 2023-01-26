<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use Image;

class ActivityController extends Controller
{
   
    public function index()
    {
        $activity = Activity::all();
        return response()->json($activity);
    }

    
    public function store(Request $request){
        $request->validate([
            'Activity_Start' => 'required',
            'Activity_TimeStart' => 'required',
            'Activity_TimeEnd' => 'required',
            'Activity_Organizer' => 'required',
            'Activity_Location' => 'required',
            'Activity_Detail' => 'required',
            'Activity_Title' => 'required',
           
        ]);
        $data_activity = array(
            'Activity_Start' => $request->input('Activity_Start'),
            'Activity_TimeStart' => $request->input('Activity_TimeStart'),
            'Activity_TimeEnd' => $request->input('Activity_TimeEnd'),
            'Activity_Organizer' => $request->input('Activity_Organizer'),
            'Activity_Location' => $request->input('Activity_Location'),
            'Activity_Detail' => $request->input('Activity_Detail'),
            'Activity_Title' => $request->input('Activity_Title'),
            
           
        );
        $Activity_Picture = $request->file('Activity_Picture');
        if(!empty($Activity_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "activitypic_".time().".".$Activity_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/activitypic/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Activity_Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/activitypic/original');
            $Activity_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_activity['Activity_Picture'] = url('/').'/images/activitypic/thumbnail/'.$file_name;
            }else{
            $data_activity['Activity_Picture'] = url('/').'/images/activitypic/thumbnail/no_img.jpg';
            }
            return activity::create($data_activity);
        
    }

    public function show(Request $request)
    {
        $requests = $request->values;
        //? array length
        $length = count($requests);
        //? get key and value
        for ($i = 0; $i < $length; $i++) {
            $key = $requests[$i]['key'];
            $value = $requests[$i]['value'];
            //? check key
            if ($key == 'Activity_ID') {
                $activity = Activity::where('Activity_ID', $value)->get();
            }
        }
        $key = array_keys($requests)[0];
        $value = $requests[$key];
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'Activity_Start' => 'required',
            'Activity_TimeStart' => 'required',
            'Activity_TimeEnd' => 'required',
            'Activity_Organizer' => 'required',
            'Activity_Location' => 'required',
            'Activity_Detail' => 'required',
            'Activity_Title' => 'required',
          
           
        ]);
        $data_activity = array(
            'Activity_Start' => $request->input('Activity_Start'),
            'Activity_TimeStart' => $request->input('Activity_TimeStart'),
            'Activity_TimeEnd' => $request->input('Activity_TimeEnd'),
            'Activity_Organizer' => $request->input('Activity_Organizer'),
            'Activity_Location' => $request->input('Activity_Location'),
            'Activity_Detail' => $request->input('Activity_Detail'),
            'Activity_Title' => $request->input('Activity_Title'),
          
           
        );
        $Activity_Picture = $request->file('Activity_Picture');
        if(!empty($Activity_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "activitypic_".time().".".$Activity_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/activitypic/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($Activity_Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/activitypic/original');
            $Activity_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_activity['Activity_Picture'] = url('/').'/images/activitypic/thumbnail/'.$file_name;
            }
            $activity = Activity::find($id);
            $activity->update($data_activity);
            return $activity;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Activity::destroy($id);
    }
}
