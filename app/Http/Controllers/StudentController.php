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
}