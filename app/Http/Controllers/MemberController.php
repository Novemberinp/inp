<?php

namespace App\Http\Controllers;

use App\Member;
use App\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MemberController extends Controller{

	/*
		连接member数据库
	 */
	public function ConnDB(){
		$member = DB::select('select * from `member`');
		dump($member);

		/*
		//新增数据
		$add = DB::insert("insert into `member` (`name`,`age`,`grade`) values(?,?,?)",[
				'inp',22,148
			]);*/
		/*
		//修改数据
		$update = DB::update("update `member` set `age` = ? where id = ?",[99,2]);
		var_dump($update);*/

		/*//删除
		$delete = DB::delete("delete from `member` where id = ?",[3]);
		dump($delete);*/
	}

	public function query(){
		
		/*//添加数据
		$insert = DB::table("member")->insert(
				['name' => 'Joy','age' => 20,'grade' => 150]
			);
		dump($insert);*/

		/*//插入后获取自增id
		$insertId = DB::table('member')->insertGetId(
				['name' => 'getId','age' => 20,'grade' => 150]
			);
		dump($insertId);*/

		/*//插入多条数据
		$insertAll = DB::table('member')->insert([
				['name' => 'insertAll03','age' => 20,'grade' => 150],
				['name' => 'insertAll04','age' => 20,'grade' => 150],
			]);
		dump($insertAll);*/
	}

	public function queryEdit(){
		/*//更新数据
		$update = DB::table('member')->where('id',1)->update(['age' => 88]);
		dump($update);*/

		//自增和自减
		//$inadd = DB::table("member")->increment('age',3);      //自增3  默认1       条件是：->where('id',1)
		//$subtract = DB::table("member")->decrement('age',3);      //自减3  默认1
		
		//自增时修改其他字段
		$inadd = DB::table("member")->where("id",1)->increment('age',3,['name' => '自增']);
		dump($inadd);
	}

	public function queryDel(){
		/*$delete = DB::table('member')->where('id',7)->delete();
		dump($delete);*/
		//truncate  清空数据表
		//DB::table("member")->truncate();
	}

	public function querySel(){
		//get   获取表的所有数据
		//$getSel = DB::table("member")->get();
		
		//first   获取第一条数据
		//$firstSel = DB::table("member")->orderBy('id','desc')->first();
		
		//where 多条件   或者where  数组
		//$whereSel = DB::table("member")->whereRaw("id > ? and age > ?",[4,17])->get();
		//select('id','name')   返回部分字段
		
		//chunk  分段获取
		DB::table("member")->orderBy("id")->chunk(2,function($member){
			dump($member);
		});

		//dump($whereSel);
	}

	public function info(){
		$return = Member::getMember();

        $student = Student::all();

		//return "member-info/Controller";
		//return view('member-info');
		return view('member/info',[
				'name' => 'inp',
				'age'  => '22',
                'student' => $student,
                'empty' => array(),
			]);
	}
}
