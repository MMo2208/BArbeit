<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsLoginController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm ()
    {
      return view ('auth.admin-login');
    }

    public function login (Request $request)
    {
      // Validate the form Data
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
      {

      //If successful, redirect to intended location

      return redirect()->intended(route('admin_view'));
      }

      //If unsuccessful, redirect back to the login with form data

      return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
