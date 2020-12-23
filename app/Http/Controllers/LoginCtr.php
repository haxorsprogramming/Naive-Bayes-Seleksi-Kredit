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
use App\Models\UserMdl;

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
        $jlhUsername = UserMdl::where('username', $username) -> count();
        if($jlhUsername < 1){
            $dr = ['status' => 'no_username'];
        }else{
            $dataUser = UserMdl::where('username', $username) -> first();
            $passwordUserDb = $dataUser -> password;
            $cekPassword = password_verify($password, $passwordUserDb);
            if($cekPassword == true){
                session(['userLogin' => $username]);
                $dr = ['status' => 'success'];
            }else{
                $dr = ['status' => 'error_password'];
            }
        }
        return \Response::json($dr);
    }
}
