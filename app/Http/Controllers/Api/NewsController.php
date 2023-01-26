<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Image;




class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(12);
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $request->validate([
            'News_Detail' => 'required',
            'News_Date' => 'required',
            'News_Time' => 'required',
           
            'News_Title' => 'required',
            'News_File' => 'required',
            'News_links' => 'required',
            'News_Type' => 'required'
        ]);
        $data_news = array(
            'News_Detail' => $request->input('News_Detail'),
            'News_Date' => $request->input('News_Date'),
            'News_Time' => $request->input('News_Time'),
            'News_File' => $request->input('News_File'),
            'News_Title' => $request->input('News_Title'),
            'News_links' => $request->input('News_links'),
            'News_Type' => $request->input('News_Type'),
        );
        $News_Picture = $request->file('News_Picture');
        if(!empty($News_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "news_".time().".".$News_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/news/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($News_Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/news/original');
            $News_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_news['News_Picture'] = url('/').'/images/news/thumbnail/'.$file_name;
            }else{
            $data_news['News_Picture'] = url('/').'/images/news/thumbnail/no_img.jpg';
            }
            return News::create($data_news);
        }
    public function update(Request $request,  $id)
    {
        $request->validate([
            'News_Detail' => 'required',
            'News_Date' => 'required',
            'News_Time' => 'required',
           
            'News_Title' => 'required',
            'News_File' => 'required',
            'News_links' => 'required',
            'News_Type' => 'required'
        ]);
        $data_news = array(
            'News_Detail' => $request->input('News_Detail'),
            'News_Date' => $request->input('News_Date'),
            'News_Time' => $request->input('News_Time'),
            'News_File' => $request->input('News_File'),
            'News_Title' => $request->input('News_Title'),
            'News_links' => $request->input('News_links'),
            'News_Type' => $request->input('News_Type'),
        );
        $News_Picture = $request->file('News_Picture');
        if(!empty($News_Picture)){
            // อัพโหลดรูปภาพ
            // เปลี่ยนชื่อรูปที่ได้
            $file_name = "news_".time().".".$News_Picture->getClientOriginalExtension();
            // กำหนดขนาดความกว้าง และสูง ของภาพที่ต้องการย่อขนาด
            /* $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/news/thumbnail');
            $path = $folderupload."/".$file_name;
            // อัพโหลดเข้าสู่ folder thumbnail
            $img = Image::make($News_Picture->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();
            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/news/original');
            $News_Picture->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_news['News_Picture'] = url('/').'/images/news/thumbnail/'.$file_name;
            }
            $news = News::find($id);
            $news->update($data_news);
            return $news;
    }

    public function destroy($id)
    {
        return News::destroy($id);
    }
    
    public function search($News_Type)
    {
        return News::where("News_Type","like","%".$News_Type."%")->paginate(25);
    }
    public function show($id)
    {
        return News::find($id);
    }

    

  
}










//ของพี่เจ
/* public function upimage(Request $request){
    $post = new News();
    if($request->hasFile('News_Picture')){
        
        $completeFileName = $request->file('News_Picture')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $ext = $request->file('News_Picture')->getClientOriginalExtension();
        $compPic = str_replace(' ', '_', $fileNameOnly).'.'. $ext;
        $path = $request->file('News_Picture')->move(('/home/wwwdev/www/testAPI2/public/images/news/original'), $compPic);
        $post->News_Picture = $compPic;
        $post->News_Detail = $request['News_Detail'];    
        $post->News_Date = $request['News_Date'];    
        $post->News_Time = $request['News_Time'];    
        $post->News_File = $request['News_File'];    
        $post->News_Title = $request['News_Title'];    
        $post->News_links = $request['News_link'];    
        $post->News_Type = $request['News_Type'];    
        
    }
    if($post->save()){
    return response()->json([
        'message' => "Successfully created",
        'success' => true,
        'data' => $post
    ], 200);
    }  else {
    return ['status' => false, 'message' => 'Post Somthing Wented Wrong'];
    };
} */