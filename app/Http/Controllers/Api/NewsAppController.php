<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsApp;

class NewsAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsapp = Newsapp::all();
        return response()->json($newsapp);
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
            'News_Detail' => 'required',
            'News_Date' => 'required',
            'News_Time' => 'required',
            'News_Picture' => 'required',
            'News_Title' => 'required',
            'News_File' => 'required',
            'News_links' => 'required',
            'News_Type' => 'required'
        ]);
        $data_newsapp = array(
            'News_Detail' => $request->input('News_Detail'),
            'News_Date' => $request->input('News_Date'),
            'News_Time' => $request->input('News_Time'),
            'News_File' => $request->input('News_File'),
            'News_Title' => $request->input('News_Title'),
            'News_links' => $request->input('News_links'),
            'News_Type' => $request->input('News_Type'),
            
        );
        $image = $request->file('News_Picture');
        if(!empty($image)){
            $file_name = "news_".time().".".$image->getClientOriginalExtension();
           /*  $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/news/thumbnail');
            $path = $folderupload."/".$file_name;

            $img = Image::make($image->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();

            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/news/original');
            $image->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_news['News_Picture'] = url('/').'/images/news/thumbnail/'.$file_name;
            
        }else{
        $data_news['image'] = url('/').'/images/news/thumbnail/no_img.jpg';
        }
        return Newsapp::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Newsapp::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'News_Detail' => 'required',
            'News_Date' => 'required',
            'News_Time' => 'required',
            'News_Picture' => 'required',
            'News_Title' => 'required',
            'News_File' => 'required',
            'News_links' => 'required',
            'News_Type' => 'required'
        ]);
        $data_newsapp = array(
            'News_Detail' => $request->input('News_Detail'),
            'News_Date' => $request->input('News_Date'),
            'News_Time' => $request->input('News_Time'),
            'News_File' => $request->input('News_File'),
            'News_Title' => $request->input('News_Title'),
            'News_links' => $request->input('News_links'),
            'News_Type' => $request->input('News_Type'),
            
        );
        $image = $request->file('News_Picture');
        if(!empty($image)){
            $file_name = "news_".time().".".$image->getClientOriginalExtension();
           /*  $imgWidth = 400;
            $imgHeight = 400; */
            $folderupload = public_path('/images/news/thumbnail');
            $path = $folderupload."/".$file_name;

            $img = Image::make($image->getRealPath());
           /*  $img->orientate()->fit($imgWidth,$imgHeight, function($constraint){
                $constraint->upsize();

            }); */
            $img->save($path);
            // อัพโหลดภาพต้นฉบับเข้า folder original
            $destinationPath = public_path('/images/news/original');
            $image->move($destinationPath, $file_name);
            // กำหนด path รูปเพื่อใส่ตารางในฐานข้อมูล
            $data_news['News_Picture'] = url('/').'/images/news/thumbnail/'.$file_name;
            
        }
            $newsapp = Newsapp::find($id);
            $newsapp->update($data_news);
            return $newsapp;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Newsapp::destroy($id);
    }
    public function search($News_Type)
    {
        return Newsapp::where("News_Type","like","%".$News_Type."%")->get();
    }
}
