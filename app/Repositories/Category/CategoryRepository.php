<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;

// use App\Repositories\Post\PostRepositoryInterface;


class CategoryRepository extends BaseRepository 
// implements PostRepositoryInterface
{
 
    public function getModel()
    {
        return \App\Category::class;
    }

    public function getProduct()
    {
        return $this->model->paginate(3);
    }



}