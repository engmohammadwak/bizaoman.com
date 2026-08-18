<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LegacyPageController extends Controller
{
    public function __invoke(string $page): BinaryFileResponse
    {
        abort_unless(in_array($page, config('farahidi.legacy_pages'), true), 404);

        return response()->file(public_path("legacy/{$page}/index.html"));
    }
}
