<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class EntrepreneurshipController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.entrepreneurship');
    }
}
