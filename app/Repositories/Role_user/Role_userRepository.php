<?php
namespace App\Repositories\Role_user;

use App\Repositories\BaseRepository;

// use App\Repositories\Post\PostRepositoryInterface;
use App\User;
use App\Role;

class Role_userRepository extends BaseRepository
// implements PostRepositoryInterface
{

    public function getModel()
    {
        return \App\Role_User::class;
    }

    public function getRoleUser()
    {

        return  $role_user = $this->model->paginate(10);

        foreach($role_user as $role_use){
            $role_use["role_user_name"] = Role::find($role_use["role_id"])->name;
        }

        foreach($role_user as $role_use){
            $role_use["user_name"] = User::find($role_use["user_id"])->name;
        }
    }


}
