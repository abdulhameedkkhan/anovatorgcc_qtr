<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = (string) $request->query('q', '');

        return view('search.index', [
            'query' => $query,
            'results' => Catalog::search($query),
        ]);
    }
}
