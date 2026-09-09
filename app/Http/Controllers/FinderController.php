<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FinderController extends Controller
{
    public function index(Request $request): View
    {
        $recommendation = null;
        $facility = $request->query('facility');
        $focus = $request->query('focus');
        $scale = $request->query('scale');

        if ($facility && $focus && $scale) {
            $slug = 'm3';

            if ($focus === 'full' || $scale === 'flagship') {
                $slug = 'a5';
            } elseif ($focus === 'essential' || $scale === 'compact') {
                $slug = $facility === 'fitness' ? 'm1' : 'm0';
            } elseif ($focus === 'progress') {
                $slug = 'm1';
            }

            $recommendation = Catalog::product($slug);
        }

        return view('finder.index', [
            'recommendation' => $recommendation,
            'facility' => $facility,
            'focus' => $focus,
            'scale' => $scale,
        ]);
    }
}
