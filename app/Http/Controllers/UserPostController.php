<?php

namespace App\Http\Controllers;

use App\Category;
use App\Blog;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\userPostRequest;


class UserPostController extends Controller
{
    /**
     * @var UserPostRepositoryInterfaces|\App\Repositories\Repository
     */
    protected $UserPostRepository;
    protected $userRepository;

    public function __construct(BlogRepository $UserPostRepository ,UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->UserPostRepository = $UserPostRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $blogs = $this->UserPostRepository->getUserPost();
        $keyword = $request->key;
        $blog_common = Blog::orderBy('created_at', 'desc')->paginate(3);
        $categorys = Category::all();

        $chuck = Blog::where('user_id',Auth::user()->id)->sum('view');
        // return view('backend.blog.index',compact('blogs'));
        return view('front_end.user_details.index',compact('blogs','keyword','blog_common','categorys','chuck'));


    }

    public function show($id)
    {
        $UserPost = $this->UserPostRepository->find($id);
        return response()->json($UserPost);
    }

    public function create()
    {
        $categorys = Category::all();
        return view('backend.blog.create',compact('categorys'));
    }

    public function store(userPostRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $data['image'] = 'data:image/;base64,'.$image;
        }
        $blogs = $this->UserPostRepository->create($data);
        $blogs->user_id =  Auth::user()->id;
        $blogs->save();

        return redirect()->route('UserPost.index')->with('message', 'Đăng bài viết thành công ...!');
    }

    public function edit(Request $request, $id)
    {
        $blogs = $this->userRepository->edits($id);
        $keyword = $request->key;
        $blog_common = Blog::orderBy('created_at', 'desc')->paginate(3);
        $categorys = Category::all();
        // return view('backend.blog.edit',compact('blogs'));
        return view('front_end.information.index',compact('blogs','keyword','blog_common','categorys'));

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $data['image'] = 'data:image/;base64,'.$image;
        }
        $blogs = $this->userRepository->update($id, $data);
        $blogs->password = Hash::make($request->password);
        $blogs->save();
        return redirect()->route('UserPost.edit',$id)->with('message', 'Cập nhật thành công ...!');
    }

    public function destroy($id)
    {
       $this->UserPostRepository->delete($id);
       return back()->with('success','UserPost deleted successfully');
    }

    public function user_post(Request $request){
        $keyword = $request->key;
        $blog_common = Blog::orderBy('created_at', 'desc')->paginate(3);
        $categorys = Category::all();
        return view('front_end.user_post.index',compact('keyword','blog_common','categorys'));
    }
}
