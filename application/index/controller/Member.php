<?php
namespace app\index\controller;
use app\index\controller\Admin;
use think\Cache;
use think\Db;
use think\db\Where;

class Member extends Admin{
	 //初始化
    protected function initialize(){
    	parent::initialize();
//      $user = session('user_login');
//      if (empty($user)) {
//          $this->redirect('index/login');
//      }
	}
	
	
}	
?>