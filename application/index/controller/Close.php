<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\db\Where;

class Close extends Controller{
	public function index(){
		$setting = Db::name('module')->where(['module' => 'cms'])->value("setting");
        $setting=unserialize($setting);
        if($setting['web_site_status']==1){
        	return $this->redirect(url('/'));
        }
		return $this->fetch();
	}
}	
?>