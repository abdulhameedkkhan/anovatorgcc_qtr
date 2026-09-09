<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class PageController extends Controller
{
    public function company(): View
    {
        return view('company.index', [
            'stats' => Catalog::stats(),
        ]);
    }

    public function support(): View
    {
        return view('support.index');
    }

    public function industries(): View
    {
        return view('industries.index', [
            'industries' => Catalog::industries(),
        ]);
    }

    public function faq(): View
    {
        return view('faq.index', [
            'faqs' => Catalog::faqs(),
        ]);
    }

    public function privacy(): View
    {
        return view('legal.privacy');
    }

    public function imprint(): View
    {
        return view('legal.imprint');
    }

    public function terms(): View
    {
        return view('legal.terms');
    }
}
