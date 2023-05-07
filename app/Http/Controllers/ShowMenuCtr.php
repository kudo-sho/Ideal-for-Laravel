<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ShowMenuCtr extends Controller
{
    public function index(Request $request){
        //コースのリストを取得
        $course = new Course();
        $course = $course->getCourseList();

        //メニューのリストを取得
        

    }
}
