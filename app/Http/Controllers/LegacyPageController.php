<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class LegacyPageController extends Controller
{
    public function __invoke(string $page): Response
    {
        abort_unless(in_array($page, config('farahidi.legacy_pages'), true), 404);

        return response()->file(public_path("legacy/{$page}/index.html"));
    }
}
