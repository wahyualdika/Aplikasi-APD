<?php

namespace App\Http\Controllers\AdminAuthentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function __construct(){
       $this->middleware('guest.admin:admin')->except('logout');
    }

    public function getLoginPage(request $request)
    {
        return view('authentication_admin.login');
    }

    public function login(Request $request)
    {
      // dd('it works');
      $validator = Validator::make($request->all(), [
          'email' => 'required|email:rfc,dns',
          'password' => 'required',
      ]);
      if ($validator->fails()) {
          return redirect('/admin/login')->withErrors($validator, 'login');
      }
      $email = $request->email;
      $password = $request->password;
      $remember = $request->remember;
      //
      if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)) {
          $request->session()->regenerate();
          return redirect('/admin/home');
          // dd('it works');
      }
      // dd('it doesnt work');
      return redirect('/admin/login')->with('status', 'Data User Tidak Ditemukan');
    }


    public function logout(Request $request){
      Auth::guard('admin')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/admin/login');
    }
}
