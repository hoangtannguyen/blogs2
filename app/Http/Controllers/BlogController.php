<?php

namespace App\Http\Controllers;

use App\Category;
use App\Blog;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Blog\BlogRepository;
use App\Http\Requests\BlogsRequest;
use Illuminate\Support\Facades\Auth;



class BlogController extends Controller
{
    /**
     * @var BlogRepositoryInterfaces|\App\Repositories\Repository
     */
    protected $postRepository;

    public function __construct(BlogRepository $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
    }

    public function view(Request $request)
    {
        // $request->user()->authorizeRoles(['Admin']);
        return view('backend.blog.index2');
    }

    public function index()
    {
        $blogs = $this->postRepository->getBlog();
        return response()->json($blogs);
    }

    public function show($id)
    {
        $post = $this->postRepository->find($id);
        $post['user_name'] = (User::find($post['data']['user_id'])->name);
        $post['user_image'] = (User::find($post['data']['user_id'])->image);
        $post['user_email'] = (User::find($post['data']['user_id'])->email);
        return response()->json($post);
    }

    public function create()
    {
        $atribute['category'] = Category::all();
        return response()->json($atribute);
    }

    public function store(BlogsRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $data['image'] = 'data:image/;base64,'.$image;
        }
        $blogs = $this->postRepository->create($data);
        $blogs->user_id =  Auth::user()->id;
        $blogs->save();
        return response()->json($blogs);
    }
    public function edit($id)
    {
        $blogs = $this->postRepository->edits($id);
        $blogs['category'] = Category::all();
        return response()->json($blogs);
    }

    public function update(BlogsRequest $request, $id)
    {
        $data = $request->all();
        if(!$request->hasFile('image')){
            $blog = Blog::find($id);
            $data['image']= $blog->image;
            $blogs = $this->postRepository->update($id, $data);
        }
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $data['image'] = 'data:image/;base64,'.$image;
        }
        $blogs = $this->postRepository->update($id, $data);
        return response()->json($blogs);
    }

    public function destroy($id)
    {
        $blogs =  $this->postRepository->delete($id);
        return response()->json($blogs);
    }

    public function view_index()
    {
        return view('backend.index');
    }

    public function getSearch(Request $request) {

        $data = $request->get('search');

        $search_drivers = Blog::where('title', 'like', "%{$data}%")
                         ->orWhere('description', 'like', "%{$data}%")
                         ->get();

        return response()->json(['data' => $search_drivers]);

    }


}
