<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/24/024
 * Time: 17:35
 */
namespace App\Http\Controllers;

class FormController extends Controller{
    public function index(){
        return view('form/index');
    }
}