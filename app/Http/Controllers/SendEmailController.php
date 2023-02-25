<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Jobs\SendMailJob;

class SendEmailController extends Controller
{
    public function index(): View
    {
        return view('kirim-email');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')->with('status', 'Email berhasil dikirim');
    }
}
