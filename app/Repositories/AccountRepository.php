<?php
namespace App\Repositories;

use App\Models\Sit;

class AccountRepository implements AccountRepositoryInterface
{
    protected $Sit;

    public function __construct(){
		    $this->Sit = new Sit();
	  }

    public function initAccount($data){
      $id = array_get($data, 'attributes.uid.0');
      $sur = array_get($data, 'attributes.givenname.0');
      $name = array_get($data, 'attributes.displayname.0');
      $user = new Sit();
      $user->uid = $id;
      $user->name = $name;
      $user->surname = $sur;
      $user->department = 'CS';
      $user->save();
    }

    public function checkin($std_id){
      $this->Sit->where('uid', $std_id)
          ->update(['status' => 1]);
      $data = $this->Sit->where('uid', $std_id)->first();
      return $data;
    }

    public function random(){
      $data = $this->Sit->where('status', 1)
              ->where('item', 0)->get();
      if (count($data)===0) {
        $info = ['uid'=>'','name'=>'','surname'=>'','department'=>''];
        return $info;
      }
      $info = $data[rand(0,count($data)-1)];
      $this->Sit->where('uid', array_get($info, 'uid'))
          ->update(['item' => 1]);
      return $info;
    }

}
