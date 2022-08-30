<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class FrontendController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('dashboard');
    }
}
