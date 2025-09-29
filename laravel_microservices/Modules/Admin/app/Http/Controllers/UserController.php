<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\UserCreateRequest;
use Modules\Admin\Http\Requests\UserUpdateRequest;

class UserController extends Controller{
    public function index(){
        // return User::all();
        return User::paginate();
    }

    public function show($id){
        return User::find($id);
    }

    public function store(UserCreateRequest $request){
        $user = User::create($request->only('first_name','last_name','email')+[
            "password"=>Hash::make(1234)
        ]);
        return response($user, Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, $id){
        $user = User::find($id);
        $user->update($request->only('first_name','last_name','email'));
        return response($user, Response::HTTP_ACCEPTED);
    }

    public function destroy($id){
        User::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
