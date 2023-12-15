<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Menu;
use Illuminate\Http\Request;

class ShowMenuCtr extends Controller
{
    public function index(Request $request){
        //コースのリストを取得
        $course = (new Course())->getCourseList();
        //$courseIndex = collect($course)->groupBy('c_name')->all();

        //メニューのリストを取得
        $menu = (new Menu())->getMenuList;

        return view('showMenu',compact('course','menu'));
        

    }
}
