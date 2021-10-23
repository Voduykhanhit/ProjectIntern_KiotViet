<?php

namespace App\Http\Controllers;
use Closure;
use Facade\FlareClient\Stacktrace\File as StacktraceFile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\Storage;
use Str;


class ContentFilterController extends Controller
{
    public function getContentFilter()
    {
        return view('admin.contentfilter.viewcontentfilter');
    }
    public function PostContent(Request $request)
    {
        $key=$request->key;
        $value=$request->value;
        $file_format=Carbon::now()->toDateString();
        $file_time = Carbon::now()->toTimeString();
        $file_name=Str::random(4)."_".$file_format.".json";
        
        
        
        
        for($i=0;$i<count($key);$i++){
            $arr[]=array($key[$i]=>$value[$i],);
        }
        $utf_8=response()->json($arr, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
        $content=json_encode($utf_8,JSON_UNESCAPED_UNICODE);
        
        $destinationPath=fopen("../storage/app/public/content_filter/".$file_name,"w");
      
        Storage::put('public/content_filter/'.$file_name,$content);
        
        $read_file=file_get_contents("../storage/app/public/content_filter/".$file_name);
       
        return response()->json($utf_8, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
}
