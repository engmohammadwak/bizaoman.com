<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function preview(): View
    {
        return view('pages.about');
    }
}
