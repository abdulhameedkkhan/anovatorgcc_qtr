<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FinderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/company', [PageController::class, 'about'])->name('company');

Route::get('/solutions', [PageController::class, 'solutions'])->name('solutions');
Route::get('/industries', [PageController::class, 'solutions'])->name('industries');

Route::get('/business', [PageController::class, 'business'])->name('business');
Route::get('/support', [PageController::class, 'support'])->name('support');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('/blog', [NewsController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [NewsController::class, 'show'])->name('blog.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/product-finder', [FinderController::class, 'index'])->name('finder');
Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/thank-you', [ContactController::class, 'thanks'])->name('contact.thanks');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/imprint', [PageController::class, 'imprint'])->name('imprint');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
