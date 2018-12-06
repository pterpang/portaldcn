<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Adldap\Laravel\Facades\Adldap;
use App\M_Session;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function customLogin(Request $request){
        $username = $request->post('username');
        $password = $request->post('password');
        // $username = 'portaldcn';
        // $password = 'P0rt@ldcn';
        if($username == "guest" && $password == "guest"){
            $request->session()->put('isLogin', true);
            $request->session()->put('displayName', 'Guest');
            $user = User::where($this->username(), $username) -> first();
            if (!$user) {
                $user = new User();
                $user->username = $username;
                $user->name = $username;
                $user->email = $username;
                $user->password = '';
            }
            $this->guard()->login($user, true);
            return "";
        }
        else {
            $ldapconfig = array();
            $ldapconfig['host'] = "dti.co.id";
            $ldapconfig['port'] = '389';
            $dn = 'CN='. $username .',OU=devuser,DC=dti,DC=co,DC=id';"Username not found.";

            if(Adldap::auth()->attempt($dn, $password, $bindAsUser = true)) {
                // the user exists in the LDAP server, with the provided password
                
                $user = User::where($this->username(), $username) -> first();
                if (!$user) {
                    $user = new User();
                    $user->username = $username;
                    $user->name = $username;
                    $user->email = $username;
                    $user->password = '';
                }
                
                $this->guard()->login($user, true);
                return "";
            }

            return "Not found";

        }
        return "";
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}