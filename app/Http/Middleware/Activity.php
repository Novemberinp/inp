<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24/024
 * Time: 17:12
 */
namespace App\Http\Middleware;


use Closure;

class Activity{

    //前置
//    public function handle($request,Closure $next){
//        if(time() < strtotime('2017-08-25')){
//            return redirect('activityWaiting');
//        }
//        return $next($request);
//    }
    //后置
    public function handle($request,Closure $next){
        $response = $next($request);
        //请求后执行
        echo '后置';
    }
}