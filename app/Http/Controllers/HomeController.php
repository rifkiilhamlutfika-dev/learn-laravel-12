<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class HomeController extends Controller
{
    public function index()
    {
        // return response(request('authenticated'), 200);
        return request()->all();
    }
}
