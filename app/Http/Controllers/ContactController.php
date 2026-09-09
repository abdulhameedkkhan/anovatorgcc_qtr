<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Support\Catalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index', [
            'facilityTypes' => Catalog::facilityTypes(),
            'countries' => Catalog::countries(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'facility_type' => ['nullable', 'string', 'max:120'],
            'message' => ['nullable', 'string', 'max:3000'],
        ]);

        ContactInquiry::query()->create($data);

        return redirect()->route('contact.thanks');
    }

    public function thanks(): View
    {
        return view('contact.thanks');
    }
}
