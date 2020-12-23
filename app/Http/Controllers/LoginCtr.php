<?php
/**
 * Import namespace & library
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Import model
 */


class LoginCtr extends Controller
{
    public function loginpage()
    {
        return view('login.login_page');
    }
    public function loginproses(Request $request)
    {
        $username = $request -> username;
        $password = $request -> password;
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
