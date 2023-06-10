<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AdminAuthController extends Controller
{

    /**
     * Show admin login page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function showLogin()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->intended(route('adminDashboard'));
        }
        return Inertia::render('Admin/Auth/Login');
    }

    /**
     * Process admin login requests
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws ValidationException
     */
    public function storeLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('adminDashboard'));

    }

    /**
     * Process admin logout request
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect(route('adminLogin'));
    }
}
