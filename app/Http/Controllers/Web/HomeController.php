<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ProjectService;

class HomeController extends Controller
{

    public function index()
    {
        $with = [
            'title' => 'Home',
            'description' => 'Welcome to the home page',
        ];

        return view('web/home/index', $with);
    }

}
