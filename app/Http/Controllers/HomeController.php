<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'products' => Catalog::products(),
            'stats' => Catalog::stats(),
            'news' => array_slice(Catalog::news(), 0, 4),
            'industries' => Catalog::industries(),
            'journey' => Catalog::journey(),
        ]);
    }
}
