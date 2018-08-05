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
                ->with('first_post',Post::orderBy('created_at','dsec')->first());
    }
}
