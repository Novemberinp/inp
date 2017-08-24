<?php
/**
 * Created by PhpStorm.
 * User: 85046
 * Date: 2017/8/18
 * Time: 15:33
 */

namespace App\Http\Controllers;

use App\Student;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller{
    public function orm1(){
        //$students = Student::all();

//        $students = Student::find(1);

        //findOrFail   查不到就报错
//        $students  = Student::findOrFail(9);

        //查询构造器

//        $students = Student::get();
//        $students = Student::where('id','>',1)->orderBy('age')->first();

//        $students = Student::chunk(2,function($res){
//            var_dump($res);
//        });

        //聚合函数

        $students = Student::count();

        dump($students);
    }

    public function createOrm(){

        //使用模型

//        $student = new Student();
//        $student->name = '小明';
//        $student->age = 99;
//        $bool = $student->save();
//        dump($bool);

        //使用create方法

        $studet = new Student();

//        $res = $studet->create(
//            ['name' => 'joy','age' => 18]
//        );

        //firstOrCreate  查找数据 若没有则新增
//        $res = Student::firstOrCreate(
//            ['name' => 'john','age' => 20]
//        );

        //firstOrNew  查找数据 若没有则新建一个对象  需要save保存
        $res = Student::firstOrNew(
            ['name' => 'jay','age' => 20]
        );

        $res = $res->save();

        dump($res);

    }

    public function updateOrm(){

//        $student = Student::find(1);
//        $student->name = 'novinp';
//        $res = $student->save();

        $res = Student::where("id",'>',4)->update(
            ['age' => 68]
        );

        dump($res);
    }

    public function delOrm(){
//        $student = Student::find(9);
//        $res = $student->delete();

        //$res = Student::destroy(5);
        //$res = Student::destroy(4,8);
        //$res = Student::destroy([2,7]);

        $res = Student::where("id",7)->delete();

        dump($res);
    }

    public function request(Request $request){

        //取值
//        $name = $request->input("name",'inp');
//        echo $name;
        //判断是否有值
        if($request->has('name')){
            echo $request->input("name");
        }
        else{
            echo 'name is empty';
        }
        //获取全部
        $request->all();

        //判断请求类型
        //echo $request->method();
//        if($request->isMethod('get')){
//            echo 'get';
//        }
//        else{
//            echo 'no';
//        }
        //是否是ajax
        $request->ajax();

        if($request->is('student/*')){
            echo 'Yes';
        }
        else{
            echo 'No';
        };

        //获取url  不带？后边的参数
        echo $request->url();
    }

    public function session_one(Request $request){
        //http request
//        $request->session()->put('mykey','myvalue');
//        echo $request->session()->get('mykey');
        //辅助函数 session()
//        session()->put('fun','funsession');
//        echo session()->get('fun');
        //session类
//        Session::put('class','session');
//        echo Session::get('class');
        //default
//        echo Session::get('default','default');
        //数组形式
        Session::put(['class' => 'session']);
        //把数据放到session的数组中
        Session::push('name','inp');
        Session::push('name','xxx');
        //$session = Session::pull('name');            //pull()  取出数据后删除
        //取出所有值
        $all = Session::all();
        dump($all);
        Session::has('name');  //判断值是否存在
        Session::forget('name');                            //删除
        Session::flush();                                   //删除所有

        //暂存 第一次访问时存在 第二次则不存在
        Session::flash('flash','flash');
    }
    public function session_two(Request $request){

    }

    public function response_one(){
        //响应json
        $data = [
            'errCode' => 0,
            'errMsg' => 'success',
            'data' => 'inp'
        ];
        response()->json($data);
        //重定向   with 带参数  Session::get()  接收
        //return redirect('session_one')->with('msg','hello');
        //action
        //return redirect()->action('StudentController@session_one');
        //route   别名跳转
//        return redirect()->route();
        //返回上一级
        return redirect()->back();
    }

    public function activityWaiting(){
        return '活动即将开始';
    }
    public function activitying(){
        return '活动正在进行';
    }
    public function activity(){
        return '活动正在进行===';
    }
}