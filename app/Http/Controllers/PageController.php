<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('index');
    }

    public function about(): View
    {
        return view('about');
    }

    public function success(): View
    {
        return view('success');
    }

    public function voting(Request $request): View|RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->route('voting.login');
        }

        abort_unless($request->user()->can('access voting'), 403);

        return view('voting');
    }

    public function articleDetails(): View
    {
        return view('article-details');
    }

    public function emailRegistrationPreview(): View
    {
        return view('email-registration-preview');
    }
}
