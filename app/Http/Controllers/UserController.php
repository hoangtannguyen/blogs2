<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
      /**
     * @var UserRepositoryInterfaces|\App\Repositories\Repository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;    
    }

    public function view()
    {
        return view('backend.user.index');
    }

    public function index()
    {   
        $users = $this->userRepository->getAll();
        return response()->json($users);

    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return response()->json($user);
    }

    public function create()
    {
        $roles['role'] = Role::all();
        return response()->json($roles);
    }
    
    public function store(UserRequest $request)
    {
        $data = $request->all();    
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $data['image'] = 'data:image/;base64,'.$image;
        }  
        $user = $this->userRepository->create($data);
        $user->password = Hash::make($request->password);
        $role  = Role::where('name',$request->roles)->first();
        $user->save();
        $user->roles()->attach($role);

        return response()->json($user);
    }
    
    public function edit($id)
    {
        $roles = $this->userRepository->edits($id);
        return response()->json($roles);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        if(!$request->hasFile('image')){
            $blog = User::find($id);
            $data['image']= $blog->image;
            $user = $this->userRepository->update($id, $data);
        }
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $data['image'] = 'data:image/;base64,'.$image;
        }
        $user = $this->userRepository->update($id, $data);
        // $user->password = Hash::make($request->password);
        // $user->save();
        return response()->json($user);
    }
    
    public function destroy($id)
    {
        $user = $this->userRepository->delete($id);
        return response()->json($user);
    }
}
