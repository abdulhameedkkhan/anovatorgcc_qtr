<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactInquiry;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'productsCount' => Product::query()->count(),
            'articlesCount' => Article::query()->count(),
            'inquiriesCount' => ContactInquiry::query()->count(),
            'latestInquiries' => ContactInquiry::query()->latest()->limit(5)->get(),
            'latestArticles' => Article::query()->orderBy('sort_order')->limit(5)->get(),
        ]);
    }
}
