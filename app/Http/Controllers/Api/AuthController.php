<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return $this->sendError($validateUser->errors(),401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return $this->sendNotifyMessage('Email & Password does not match with our record.',401);
            }

            $user = User::where('email', $request->email)->first();

            return $this->sendResponse([
                'user' => new UserResource($user),
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ]);

        } catch (\Throwable $th) {
            return $this->sendNotifyMessage($th->getMessage(),500);
        }
    }
}