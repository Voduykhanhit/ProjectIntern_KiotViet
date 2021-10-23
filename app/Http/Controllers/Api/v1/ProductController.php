<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ProductController extends Controller
{
    public function getApiProduct()
    {
        
            $access_token = fopen("../storage/app/public/access_token.txt", "r");
            $access_token=fgets($access_token);
            $retailer=fopen("../storage/app/public/retailer.txt", "r");
            $retailer=fgets($retailer);
            $req = Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.$access_token,
                'Accept' => 'application/json',
                'params'=>[
                    'pageSize'=>1,
                ]
            ]
            )->get('https://public.kiotapi.com/products');
            $checkstatus = $req->status();
            if($checkstatus==200)
            {
                $response=json_decode($req->Body());
                return response()->json($response,200);
            }else{
                return response()->json(
                    [
                        'error'=>'Mã token phía đối tác hết thời hạn sử dụng'
                    ],400
                );
            }
    }
}
