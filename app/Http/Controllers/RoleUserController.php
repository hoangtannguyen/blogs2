<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Role_user\Role_userRepository;
use App\Role;
use App\Role_User;
use APP\User;


class RoleUserController extends Controller
{

      /**
     * @var RoleUserRepositoryInterfaces|\App\Repositories\Repository
     */
    protected $roleUserRepository;

    public function __construct(Role_userRepository $roleUserRepository)
    {
        $this->middleware('auth');
        $this->roleUserRepository = $roleUserRepository;    
    }

    public function view()
    {
        return view('backend.role_user.index');
    }

    public function index()
    {   
        $role_user = $this->roleUserRepository->getRoleUser();

        foreach($role_user as $role_use){
            $role_use["role_user_name"] = Role::find($role_use["role_id"])->name;
        }

        foreach($role_user as $role_use){
            $role_use["user_name"] = User::find($role_use["user_id"])->name;
        }
        
        return response()->json($role_user);
    }

    public function show($id)
    {
        $roleUser = $this->roleUserRepository->find($id);
        return response()->json($roleUser);
    }


    public function create()
    {
        $atribute['role'] = Role::all();
        $atribute['user'] = User::all();
        return response()->json($atribute);       
    }

    public function store(Request $request)
    {
        $data = $request->all();      
        $role_user = $this->roleUserRepository->create($data);
        return response()->json($role_user);
    }
    
    public function edit($id)
    {
        $role_user = $this->roleUserRepository->edits($id);
        $role_user['role'] = Role::all();
        $role_user['user'] = User::all();
        return response()->json($role_user);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $role_user = $this->roleUserRepository->update($id, $data);
        return response()->json($role_user);
    }
    
    public function destroy($id)
    {
        $role_user = $this->roleUserRepository->delete($id);
        return response()->json($role_user);
    }
}
