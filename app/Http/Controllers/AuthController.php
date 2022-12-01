<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try{
        $validateUser = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validateUser->errors()
            ]);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Tạo tài khoản thành công',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'errors' => $validateUser->errors()
                ]);
            }
            if(!Auth::attempt($request->only('email','password'))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email và mật khẩu không đúng'
                ]);
            }
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
