<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home(){
        $banners=Banner::where('publish_status',1)->get();
        $roomTypes=RoomType::get();
        return View('site.home',compact('banners','roomTypes'));
    }

    function contactUs(){
        return view('site.contact');
    }

    function about(){
        return view('site.aboutUs');
    }

    function booking(){
        return view('site.booking');
    }
}
