<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use File;
use Image;
use Session;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

  class LoginController extends Controller {

    /**
     * Show the application tournament.
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct(User $user){   
        $this->user = $user;
    }
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $user_record =$this->user->select('*')->where('email', $email)->first();
        if (empty($user_record)){
            Session::flash('error_msg', 'These credentials do not match our records!!');
            return redirect()->back();
        }
        if ($user_record->password){
            $hash_password = $user_record->password;
        }
        if (!empty($user_record) && Hash::check($password, $hash_password)){
            $session = array(
                'id' => $user_record->id,
                'name' => $user_record->name,
                'email' => $user_record->email,
                'password' => $user_record->password,
                 
            );
            $request->session()->put('user_info', $session);
            return redirect('dashboard');
        }
        else{
            if (!empty($user_record)){
                Session::flash('error_msg', 'Password is incorrect!');
                return redirect()->back();
            }else{
                Session::flash('error_msg', 'Username/Email is incorrect!');
                return redirect()->back();
            }
        }
    }

    public function dashboard(){
        if (isset(Session::get('user_info')['id'])){
            $user_list = $this->user->where('id','!=',Session::get('user_info')['id'])->get();
            return view('dashboard', ['user_list' => $user_list]);
        }else{
            return redirect('/');
        }
    }

   
    public function logout(){         
        Session::flush();
        session()->forget('user_info');
        return redirect('/');
    }

}