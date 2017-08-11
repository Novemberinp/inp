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
		var_dump($member);
		$add = DB::insert("insert into `member` ('name','age') values(?,?)",[
				
			]);
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
