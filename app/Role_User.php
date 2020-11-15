<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $table = 'role_user';

    protected $fillable = ['user_id','role_id'];


    public function usersMany()
    {
        return $this->belongsToMany('App\User');
    }

}
