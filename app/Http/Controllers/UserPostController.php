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
        return view('backend.blog.index',compact('blogs'));
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
        return redirect()->route('UserPost.index')->with('message', 'Create success ...!');
    }

    public function edit($id)
    {
        $blogs = $this->userRepository->edits($id);
        return view('backend.blog.edit',compact('blogs'));
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
        return redirect()->route('UserPost.edit',$id)->with('message', 'Edit Success ...!');
    }

    public function destroy($id)
    {
       $this->UserPostRepository->delete($id);
       return back()->with('success','UserPost deleted successfully');
    }
}
