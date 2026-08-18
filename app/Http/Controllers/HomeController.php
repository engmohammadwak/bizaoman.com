<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        return response()->file(public_path('legacy/index.html'));
    }
}
