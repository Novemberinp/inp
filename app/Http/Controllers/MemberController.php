<?php

namespace App\Http\Controllers;

use App\Member;
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

	public function info(){
		$return = Member::getMember();
		dump($return);
		//return "member-info/Controller";
		//return view('member-info');
		return view('member/info',[
				'name' => 'inp',
				'age'  => '22'
			]);
	}
}
