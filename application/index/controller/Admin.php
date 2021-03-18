<?php
// +----------------------------------------------------------------------
// | Yzncms [ 御宅男工作室 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018 http://yzncms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 御宅男 <530765310@qq.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 公共控制模块
// +----------------------------------------------------------------------
namespace app\index\controller;
use app\index\model\Category as Category_Model;
use think\Db;
use think\Controller;
use think\db\Where;

class Admin extends Controller
{   
	//初始化
    protected function initialize(){
    	$this->Category_Model = new Category_Model;
        $setting = Db::name('module')->where(['module' => 'cms'])->value("setting");
        $setting=unserialize($setting);
        if($setting['web_site_status']==0){
        	return $this->redirect('close/index');
        }else if($setting['web_site_status']==1){
        	config('web_site_status',$setting['web_site_status']);
	    	config('site_name',$setting['site_name']);
	        config('site_title',$setting['site_title']);
	        config('site_keyword',$setting['site_keyword']);
	        config('site_description',$setting['site_description']);
	        
	        $w=new Where;
	    	//状态
	    	$w['status']=1;
	    	//单页
	    	$w['type']=1;
	    	//关于我们
	    	$w['parentid']=1;
	    	$_list=$this->Category_Model->where($w)->order(['listorder','id'])->limit(5)->select();
	    	$this->assign('_list',$_list);
        }
        
	}
	
	
}
