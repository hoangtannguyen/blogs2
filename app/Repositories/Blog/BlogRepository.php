<?php
namespace App\Repositories\Blog;
use App\Repositories\BaseRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogRepository extends BaseRepository 
// implements BlogRepositoryInterface
{
    public function getModel()
    {
        return \App\Blog::class;
    }

    public function getBlog()
    {
        return $this->model->with('categories')->with('users')->orderBy('view', 'desc')->paginate(10);
    }

    public function getUserPost()
    {
        return $this->model->where('user_id',Auth::user()->id)->get();
    }

}