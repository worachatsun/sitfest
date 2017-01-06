<?php

namespace App\Http\Controllers;

use Auth;
use Input;
// use Adldap;
// use Adldap\Contracts\AdldapInterface;
use App\Repositories\AccountRepositoryInterface;

class AlchemistController extends ACMBaseController{

  // protected $adldap;
  protected $AccountRepository;

  public function __construct(AccountRepositoryInterface $AccountRepository)
    {
        // $this->adldap = $adldap;
        $this->AccountRepository = $AccountRepository;
    }

    public function getIndex()
    {
      $data = ['uid'=>'','name'=>'','surname'=>'','department'=>''];
      return view('index', $data);
    }

    public function postIndex(){
      $data = Input::all();
      $data = $this->AccountRepository->checkin(array_get($data, 'uid'));
      if ($data===""|$data===null) {
        return redirect('/');
      }
      return view('index', $data);
    }

    public function getRandom(){
      $data = $this->AccountRepository->random();
      return view('random', $data);
    }

    // public function getIndex()
    // {
    //     //$arr;
    //     //$user = Adldap::getDefaultProvider()->search()->where('uid', '=', '571305*')->first();
    //     //57=264->1-154,201-263 58=262->1-124,201-261 59=251->1-143,201-250 56=276->1-129,201-275
    //     for ($i=201; $i <= 251; $i++) {
    //       if ($i<10) {
    //         $user = Adldap::getDefaultProvider()->search()->where('uid', '=', '5913050000'.$i)->first();
    //       }elseif ($i<100) {
    //         $user = Adldap::getDefaultProvider()->search()->where('uid', '=', '591305000'.$i)->first();
    //       }elseif ($i<1000) {
    //         $user = Adldap::getDefaultProvider()->search()->where('uid', '=', '59130500'.$i)->first();
    //       }
    //       $data = $this->AccountRepository->initAccount($user);
    //       $a[$i] = array_get($user, 'attributes.uid.0').' '.array_get($user, 'attributes.displayname.0').' '.array_get($user, 'attributes.givenname.0');
    //       //dd($user);
    //     }
    //     return $a;
    //     // $data = $this->AccountRepository->getAllAccount();
    //     // return $data;
    // }


}
