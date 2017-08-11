<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
//基础路由 get/post

Route::get('test',function(){
	return "Hello World!!";
});

//多请求路由   指定请求/全部请求

Route::match(['get','post'],'multy',function(){
	return "this is multy";
});

Route::any('all',function(){
	return "this is all";
});

//路由参数

Route::get('User/{id}',function($id){
	return "Id is ".$id;
});

//路由参数可为空
Route::get('User/{id?}',function($id = "sex"){
	return "Id is ".$id;
});

//路由参数可用正则验证
Route::get('check/{id?}',function($id = "sex"){
	return "Id is ".$id;
})->where("id","[A-Za-z]+");

//多个路由参数可用正则验证
Route::get('checkAll/{id}/{name}',function($id = "sex",$name = null){
	return "Id is ".$id.". Name is ".$name;
})->where(["id" => "[0-9]+","name" => "[A-Za-z]+"]);

//路由别名
Route::get("User/alias",['as' => 'alias',function(){
	return "This is alias router";
}]);

//路由 群组
Route::group(['prefix' => 'member'],function(){

	//路由参数可为空
	Route::get('User/{id?}',function($id = "sex"){
		return "member-User : Id is ".$id;
	});

	Route::get('test',function(){
		return "member-test：Hello World!!";
	});

});

//路由中输出视图
Route::get('display',function(){
	return view('welcome');
});*/


//路由关联控制器
Route::get("member/info",['uses' => "MemberController@info"]);

Route::get("member/ConnDB",['uses' => "MemberController@ConnDB"]);

Route::get("member/query",['uses' => "MemberController@query"]);
Route::get("member/queryEdit",['uses' => "MemberController@queryEdit"]);
Route::get("member/queryDel",['uses' => "MemberController@queryDel"]);
Route::get("member/querySel",['uses' => "MemberController@querySel"]);