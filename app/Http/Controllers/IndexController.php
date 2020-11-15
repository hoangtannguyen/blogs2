<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use App\Role;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(Request $request){
        $categorys = Category::all();
        $blog_all = Blog::take(3)->orderBy('view','desc')->get();
        $blog_common = Blog::take(3)->orderBy('created_at', 'desc')->get();
        $keyword = $request->key;
        return view('front_end.post.index',compact('categorys','blog_all','blog_common','keyword'));  
    }
    
    public function details(Request $request,$id){
        $blog_common = Blog::take(3)->orderBy('created_at', 'desc')->get();
        $blogs = Blog::where('id',$request->id)->firstOrFail();
        $viewed = Session::get('viewed_post',[]);
        if (!in_array($blogs->id, $viewed)) {
            $blogs->increment('view');
            Session::push('viewed_post',$blogs->id);
        }
        return view('front_end.details.index',compact('blogs','blog_common'));
    }
    

}
