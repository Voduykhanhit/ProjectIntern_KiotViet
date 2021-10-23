<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Storage;
use Closure;

class CheckKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $client_secret = fopen('../storage/app/public/client_secret.txt','r');
        $client_secret = fgets($client_secret);
        
        $header = $request->header('client-secret');
        if($header == $client_secret)
        {
            return $next($request);
        }else{
            return response()->json([
                'error'=>'Mã bảo mật không hợp lệ',
            ], 400);
        }
    }
}
