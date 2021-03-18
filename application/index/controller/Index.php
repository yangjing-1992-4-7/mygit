<?php
namespace app\index\controller;
use app\index\model\Category as Category_Model;
use app\index\model\Article as Article_Model;
use app\index\controller\Admin;
use think\Cache;
use think\Db;
use think\db\Where;

class Index extends Admin{
	 //初始化
    protected function initialize(){
    	parent::initialize();
        $this->Category_Model = new Category_Model;
        $this->Article_Model = new Article_Model;
  
	}
	
	//首页
    public function index(){
    	if(is_mobile()){
    		$this->redirect('index/index_wap/index_wap');
    	}
        return $this->fetch();
    }
    
    
    //用户服务协议
    public function pc_term(){
    	 return $this->fetch();
    }
    
    //常见问题
    public function question(){
    	 return $this->fetch();
    }
    
    //关于我们
    public function about(){
    	$where=new Where;
    	$id=$this->request->param('id/d');
    	
    	//状态
    	$where['status']=1;
    	//单页
    	$where['type']=1;
    	//关于我们
    	$where['parentid']=1;
    	$list=$this->Category_Model->where($where)->order(['listorder','id'])->select();
    	if($id){
    		$where['id']=$id;
    	}  	
    	$about=$this->Category_Model->where($where)->order(['listorder','id'])->alias('category')
			->leftjoin('page','category.id=page.catid')			
	        ->field('category.*,page.title,page.content')
	        ->find();
        $id=$about['id'];
        
        
        $this->assign('id',$id);
    	$this->assign('about',$about);
    	$this->assign('list',$list);
    	return $this->fetch();
    }
    
    //登录
    public function login(){
    	return $this->fetch();
    }
    
    //注册
    public function reg(){
    	return $this->fetch();
    }
    
    //借款列表
    public function borrow(){
    	return $this->fetch();
    }
    
    //填写出借信息
    public function repay(){
    	return $this->fetch();
    }
    
    //借款详情
    public function detail(){
//  	$id=$this->request->param('id/d');
//  	$info=Db::name('product')->where('id',$id)->alias('product')
//			->leftjoin('product_data','product.id=product_data.did')			
//	        ->field('product.*,product_data.did')
//	        ->find();
//  	if(!$id||!$info){
//  		$this->error('项目不存在');
//  	}
//  	
//  	$this->assign('id',$id);
//  	$this->assign('info',$info);
    	return $this->fetch();
    }
    
    //服务范本
    public function loan(){
    	return $this->fetch();
    }
}
