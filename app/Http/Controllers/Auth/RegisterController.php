<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Input;
use Adldap;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ACMBaseController;
use App\Repositories\AccountRepositoryInterface;

class RegisterController extends ACMBaseController{

    protected $AccountRepository;

    public function __construct(AccountRepositoryInterface $AccountRepository){
      parent::__construct();
      $this->AccountRepository = $AccountRepository;
    }

    public function getIndex(){
      return $this->theme->scope("auth.index")->render();
    }

    public function postIndex(){
      $data = Input::all();
      $checkAccount = $this->AccountRepository->search(array_get($data,'std_id'));
      $validator = $this->validateRegister($data);

      if ($validator->fails()) {
        $messages = $validator->messages();
        return redirect('register')->withErrors($validator)->withInput();
      }elseif ($checkAccount != null) {
        $error['already'] = 'รหัส '.array_get($data,'std_id').' ได้ทำการสมัครไปแล้ว';
        return redirect('register')->withErrors($error)->withInput();
      }else {
        $user = Adldap::getDefaultProvider()->search()->where('uid', '=', array_get($data,'std_id'))->first();
      }

      $faculty = explode("/", array_get($user, 'attributes.homedirectory.0'));
      $info = [
        'std_id' => array_get($data,'std_id'),
        'name' => array_get($user, 'attributes.displayname.0'),
        'surname' => array_get($user, 'attributes.givenname.0'),
        'mail' => array_get($user, 'attributes.mail.0'),
        'faculty' => array_get($faculty, '2')
      ];
      return $this->theme->scope("auth.register",$info)->render();
    }

    public function postAccount(){
      $data = Input::all();
      $this->AccountRepository->registerAccount($data);
      return redirect('register');
    }

    public function validateRegister($data){
      $rules = array(
          'std_id' => 'required|max:11|min:11',
      );
      $messages = array(
          'std_id.required'  => 'กรุณากรอกรหัสนักศึกษา',
          'std_id.min'  => 'รหัสนักศึกษามี 11 หลักรู้มั้ย',
          'std_id.max'  => 'รหัสนักศึกษามี 111 หลักรู้มั้ย',
          'std_id.integer'  => 'รหัสนักศึกษาเป็นตัวเลข',
      );

      $validator = Validator::make($data,$rules,$messages);

      return $validator;
    }

    public function getAssignrole(){
      return $this->theme->scope("auth.assignRole")->render();
    }

    public function postAssignrole(){
      $data = Input::all();
      $this->AccountRepository->editRole($data);
      return redirect('alchemist');
    }

}
