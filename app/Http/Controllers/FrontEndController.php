<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('index')
                ->with('title',Setting::first()->site_name)
                ->with('categories',Category::take(4)->get())
                ->with('first_post',Post::orderBy('created_at','dsec')->first())
                ->with('second_post',Post::orderBy('created_at','dsec')->skip(1)->take(1)->get()->first())
                ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(2)->get()->first());
    }
}
