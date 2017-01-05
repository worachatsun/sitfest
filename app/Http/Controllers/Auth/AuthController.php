<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Input;
use Adldap;
use Session;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller{

    public function getLogout()
    {
        Auth::logout();
        return redirect('auth/login');
    }

    public function getLogin(){
      if(Auth::user()!=null){
        return redirect('/alchemist');
      }
      $theme = \Theme::uses('alchemist')->layout('default');
      return $theme->layout('login')->scope("auth.login")->render();
    }

    public function postLogin(){

        $error = "";

        $validator = $this->validateLogin(Input::all());

        $username = Input::get('username');
        $password = Input::get('password');

        if ($validator->fails()) {
          $messages = $validator->messages();
          return redirect('auth/login')->withErrors($validator)->withInput();
        }else {
          if (!Adldap::getDefaultProvider()->search()->where('uid', '=', $username)->first()) {
            $error['username']='กรุณากรอกรหัสนักศึกษาให้ถูกต้อง';
            if (!Input::has('password')) {
                $error['password']='กรุณากรอกรหัสผ่าน';
            }
            return redirect('auth/login')->withErrors($error)->withInput();
          }

          $user = User::where('username',$username)->first();

          if (isset($user)) {
            if (Adldap::getDefaultProvider()->auth()->attempt($username,$password)){
              Auth::Login($user);
              return redirect('/alchemist');
            }
          }elseif(isset($user)===false){
            $error['auth'] = 'คุณไม่ได้อยู่ใน Alchemist';
            return redirect('auth/login')->withErrors($error)->withInput();
          }

          if (Input::has('password')) {
                  $error['password']='รหัสผ่านของคุณไม่ถูกต้อง';
          }

          $theme = \Theme::uses('alchemist')->layout('default');
          return redirect('auth/login')->withErrors($error)->withInput();
        }
    }

    public function validateLogin($data){
      $rules = array(
          'username' => 'required',
          'password' => 'required'
      );
      $messages = array(
          'username.required'  => 'กรุณากรอกรหัสนักศึกษา',
          'password.required'  => 'กรุณากรอกรหัสผ่าน',
      );

      $validator = Validator::make($data,$rules,$messages);

      return $validator;
    }

}
