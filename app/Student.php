<?php
/**
 * Created by PhpStorm.
 * User: 85046
 * Date: 2017/8/18
 * Time: 14:48
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    protected $table = 'student';
    protected $primaryKey = 'id';
    //关闭create update
    //public $timestamps = false;

    //指定允许批量赋值的字段
    protected $fillable = ['name','age'];

    //指定不允许批量赋值的字段
    protected $guarded = [];

    //自动维护时间戳类型
    public function getDateFormat()
    {
        return time();
    }

    //查询出来的时间戳不做任何处理
//    public function asDateTime($value)
//    {
//        return $value;
//    }
}