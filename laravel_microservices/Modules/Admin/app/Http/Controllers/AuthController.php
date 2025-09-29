<?php
namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(Request $request){
        // return $request->toArray();
        if(Auth::attempt(
            $request->only('email', 'password')
        )){
            $user = Auth::user();
            $token = $user->createToken('admin')->accessToken;
            return [
                'token'=>$token
            ];
        }
        return response([
            'error'=>"Invalid Credentials"
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->only('first_name','last_name','email')+[
            "password"=>Hash::make($request->input('password'))
        ]);
        return response($user, Response::HTTP_CREATED);
    }
}
