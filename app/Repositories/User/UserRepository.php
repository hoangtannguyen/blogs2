<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;

// use App\Repositories\Post\PostRepositoryInterface;


class UserRepository extends BaseRepository 
// implements PostRepositoryInterface
{
 
    public function getModel()
    {
        return \App\User::class;
    }

    public function getProduct()
    {
        return $this->model->with('role_user')->paginate(5);
    }



}