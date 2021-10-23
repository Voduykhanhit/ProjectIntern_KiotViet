<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RetailerController extends Controller
{
    public function getRetailer(){
        try{
            $access_token = fopen("../storage/app/public/access_token.txt", "r");
            $access_token=fgets($access_token);
            $retailer=fopen("../storage/app/public/retailer.txt", "r");
            $retailer=fgets($retailer);
            $response = Http::withHeaders([
                'Retailer'=>$retailer,
                'Authorization' =>'Bearer '.$access_token,
                'Accept' => 'application/json',
            ])->get('https://public.kiotapi.com/branches');
            
            $category = Http::withHeaders(
                [
                    'Retailer'=>$retailer,
                    'Authorization'=>'Bearer '.$access_token,
                    'Accept'=>'application/json',
                ]
            )->get('https://public.kiotapi.com/categories');
           

            $product = Http::withHeaders(
                [
                    'Retailer'=>$retailer,
                    'Authorization'=>'Bearer '.$access_token,
                    'Accept'=>'application/json',
                ]
            )->get('https://public.kiotapi.com/products');
            

            $orders = Http::withHeaders(
                [
                    'Retailer'=>$retailer,
                    'Authorization'=>'Bearer '.$access_token,
                    'Accept'=>'application/json',
                ]
            )->get('https://public.kiotapi.com/orders');
            
            $customers = Http::withHeaders(
                [
                    'Retailer'=>$retailer,
                    'Authorization'=>'Bearer '.$access_token,
                    'Accept'=>'application/json',
                ]
            )->get('https://public.kiotapi.com/customers');
            
            
            $checkstatus = $response->status();
            
            if($checkstatus == 200 && $category->status() == 200 && $product->status() == 200 && $orders->status() == 200 && $customers->status() == 200)
            {
                $info = $response->json()['data'];
                $countctg = count($category->json()['data']);
                $countpd = count($product->json()['data']);
                $countod = count($orders->json()['data']);
                $countctm = count($customers->json()['data']);
                return view('admin.retailer.inforetailer',compact('info','retailer','countctg','countpd','countod','countctm'));
            }else{
                return redirect()->back()->with('error','Không kết nối được');
            }
          
        }catch(\Exception $e)
        {
            echo "Cửa hàng đã hết thời gian sử dụng";
        }
    }
}
