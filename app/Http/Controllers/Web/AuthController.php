<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Web\AuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->service = new AuthService();
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('web/auth/login');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $response = $this->service->login($request);

        return $this->response($response["message"], $response["code"], $response["redirect"] ?? null);

    }

    /**
     * @return Application|Factory|View
     */
    public function logout(): Application|Factory|View
    {
        Auth::logout();

        return redirect('/login');
    }

}
