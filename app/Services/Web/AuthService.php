<?php

namespace App\Services\Web;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthService extends WebService
{
    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $this->niceNames = [
            'email' => 'E-Mail',
            'password' => 'Password'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function login(Request $request): array
    {
        $validator = Validator::make($request->all(), $this->rules, [], $this->niceNames);

        if ($validator->fails()) {
            $errors = implode(' ', $validator->errors()->all());

            return [
                'message' => $errors,
                'code' => 422,
            ];
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            return [
                'message' => 'Successfully process',
                'code' => 200,
                'redirect' => 'home'
            ];
        }

        return [
            'message' => 'Check your credentials.',
            'code' => 422,
        ];
    }
}
