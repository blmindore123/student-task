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

  class RegisterController extends Controller {

  	public function user_register(Request $request) {
      DB::table('tbl_users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->input('password')),
        'show_password' => $request->password
      ]);
      
      return response()->json(['success'=>'Form is successfully submitted!']);

    }

  }