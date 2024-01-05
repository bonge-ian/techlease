<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return inertia()->render(component: 'Home');
    }
}
