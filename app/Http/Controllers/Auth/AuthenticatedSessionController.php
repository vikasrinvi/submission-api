<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {
	/**
	 * Display the login view.
	 */
	public function create(): View {
		return view('auth.login');
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function store(LoginRequest $request): RedirectResponse {
		$request->authenticate();

		$request->session()->regenerate();

		return redirect()->intended(route('dashboard', absolute: false));
	}

	/**
	 * Destroy an authenticated session.
	 */
	public function destroy(Request $request): RedirectResponse {
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}

	public function apiLogin(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			// Authentication passed...
			return response()->json(['token' => auth()->user()->createToken('authToken')->plainTextToken]);
		}

		return response()->json(['error' => 'Unauthorized'], 401);
	}
}
