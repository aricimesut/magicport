<?php

namespace App\Services\Api;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthService extends ApiService
{
    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $this->niceNames = [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function login($request): array
    {
        $validator = Validator::make($request->all(), $this->rules, [], $this->niceNames);

        if ($validator->fails()) {
            $errors = implode(' ', $validator->errors()->all());
            return [
                'message' => $errors,
                'status' => 422,
                'data' => []
            ];
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return [
                'message' => 'Successfull login',
                'status' => 200,
                'data' => [
                    'token' => $token
                ]
            ];
        } else {
            return [
                'message' => 'Email or password is incorrect',
                'status' => 401,
                'data' => []
            ];
        }

    }

    /**
     * @return array
     */
    public function logout(): array
    {
        Auth::user()->token()->revoke();
        return [
            'message' => 'Çıkış başarılı',
            'status' => 200,
            'data' => []
        ];
    }

}
