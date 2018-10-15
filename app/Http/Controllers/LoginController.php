<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
    	return view('front.login');
    }

	public function postLogin(Request $request) {
		//dd($request->all());
		$credentials = $request->only('name', 'password');

		if (Auth::attempt(['name' => $request->get('name'), 'password' => $request->get('password') ])) {
		    // Authentication passed...
		    return redirect('/dashboard');
		}

		return redirect()->back()->with('error', 'Mauvais mot de passe');
	}
}
