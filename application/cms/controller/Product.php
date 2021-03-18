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
// | cms管理
// +----------------------------------------------------------------------
namespace app\cms\controller;

use app\cms\model\Cms as Cms_Model;
use app\cms\model\Product as Product_Model;
use app\cms\model\Page as Page_Model;
use app\common\controller\Adminbase;
use think\Db;
use think\db\Where;

class Product extends Adminbase
{
    protected function initialize()
    {
        parent::initialize();
        
        $this->Cms_Model = new Cms_Model;
        $this->Product_Model = new Product_Model;
    }
    
    public function get_child_list($category_list=array()){
    	if(is_array($category_list)){
    		$where = new Where;
    		$where['status']=1;
	    	$where['modelid']=3;
    		foreach($category_list as $k=>$v){
				$where['parentid']=$v['id'];
				$cate=Db::name('category')->where($where)->order(['listorder','id'])->select();
				if(count($cate)>0){
					$category_list[$k]['child_list']=$this->get_child_list($cate);	
				}
			}
			
			return $category_list;
    	}else{
    		return false;
    	}
    }
    
    public function index()
    {   
    	$where = new Where;
    	$where['status']=1;
    	$where['parentid']=0;
    	$where['modelid']=3;
    	
    	$category_list=Db::name('category')->where($where)->order(['listorder','id'])->select();
    	//递归查出所有子代
     	//$category_all_list=$this->get_child_list($category_list);
    	$this->assign("category_list",$category_list);
    	
    	if ($this->request->isAjax()) {
    		$data = $this->request->param();
            $limit = $this->request->param('limit/d', 10);
            $page = $this->request->param('page/d', 10);
            
    	    $map = new Where;
    	  
	        if($data['title']){
	        	$map['title']=array("like","%".$data['title']."%");
	        }
	        if($data['mobile']){	        	
	        	$user_id=Db::name('member')->where('mobile',$data['mobile'])->value('id');
	        	$map['uid']=$user_id;        	
	        }
	        if($this->request->param('min_price/d')&&$this->request->param('max_price/d')){
	        	$map['oldprice']=array('between',[$data['min_price'],$data['max_price']]);	
	        }else{
	        	if($this->request->param('min_price/d')){
	        		$map['oldprice']=array('>=',$data['min_price']);
	        	}else if($this->request->param('max_price/d')){
	        		$map['oldprice']=array('<=',$data['max_price']);
	        	}
	        } 
            
            if($data['cat']){
            	$catid_list=[];
            	$cate=Db::name('category')->where('id',$data['cat'])->find();
            	if($cate['child']==0){
            		$map['catid']=$cate['id'];
            	}else{
            		$cats= Db::name('category')->where('parentid',$data['cat'])->column('id');
	            	if($cate['parentid']==0){
	            		$catid_list=Db::name('category')->where('parentid','in',$cats)->column('id');
	            	}else{
	            		$catid_list=$cats;
	            	}
	            	
		        	$map['catid']=array("in",$catid_list);
            	}
            	
	        }
            $total = $this->Product_Model->where($map)->count();
            $list = $this->Product_Model->page($page, $limit)->where($map)->alias('product')
			->leftjoin('member','product.uid=member.id')	
			->leftjoin('category','product.catid=category.id')		
	        ->field('product.*,member.nickname,member.mobile,category.catname')
			->order(['listorder','updatetime' => 'desc'])->select()
			->withAttr('updatetime', function ($value, $data) {
                return date('Y-m-d H:i:s', $value);
            });
   
            $result = array("code" => 0, "count" => $total, "data" => $list);
            return json($result);
        }
     
        return $this->fetch();
    }


    /**
     * 导出全部项目
     */
    public function export(){
    	$data = $this->request->param();
	    $map = new Where;
	  
        if($data['title']){
        	$map['title']=array("like","%".$data['title']."%");
        }
        if($data['mobile']){	        	
        	$user_id=Db::name('member')->where('mobile',$data['mobile'])->value('id');
            $map['uid']=$user_id;
        }
        if($this->request->param('min_price/d')&&$this->request->param('max_price/d')){
        	$map['oldprice']=array('between',[$data['min_price'],$data['max_price']]);	
        }else{
        	if($this->request->param('min_price/d')){
        		$map['oldprice']=array('>=',$data['min_price']);
        	}else if($this->request->param('max_price/d')){
        		$map['oldprice']=array('<=',$data['max_price']);
        	}
        }
        
        if($data['cat']){
        	$catid_list=[];
        	$cate=Db::name('category')->where('id',$data['cat'])->find();
        	if($cate['child']==0){
        		$map['catid']=$cate['id'];
        	}else{
        		$cats= Db::name('category')->where('parentid',$data['cat'])->column('id');
            	if($cate['parentid']==0){
            		$catid_list=Db::name('category')->where('parentid','in',$cats)->column('id');
            	}else{
            		$catid_list=$cats;
            	}
            	
	        	$map['catid']=array("in",$catid_list);
        	}
        	
        }
        
        
        $total = $this->Product_Model->where($map)->count();
        if(!$total){
        	$result = array("code" => 0, "msg" => '没有数据');
            return json($result);
        }
        
        $list = $this->Product_Model->where($map)->alias('product')
		->leftjoin('member','product.uid=member.id')			
        ->field('product.*,member.nickname,member.mobile')
		->order(['listorder','updatetime' => 'desc'])->select()
		->withAttr('updatetime', function ($value, $data) {
            return date('Y-m-d H:i:s', $value);
            });
   
        $result = array("code" => 1, "msg" => '', "data" => $list);
        return json($result);
    }
    

    //添加栏目
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $catid = intval($data['modelField']['catid']);
            if (empty($catid)) {
                $this->error("请指定栏目ID！");
            }
            if(!$data['modelField']['image']){
            	$data['modelField']['image']=$data['image'];
            }            
            $category = getCategory($catid);
            if (empty($category)) {
                $this->error('该栏目不存在！');
            }          
            if ($category['type'] == 2) {
                $data['modelFieldExt'] = isset($data['modelFieldExt']) ? $data['modelFieldExt'] : [];           
                try {
                    $this->Cms_Model->addModelData($data['modelField'], $data['modelFieldExt']);
                } catch (\Exception $ex) {
                    $this->error($ex->getMessage());
                }
            } else if ($category['type'] == 1) {
                $Page_Model = new Page_Model;
                if (!$Page_Model->savePage($data['modelField'])) {
                    $error = $Page_Model->getError();
                    $this->error($error ? $error : '操作失败！');
                }
            }
            $this->success('操作成功！');
        } else {
            $catid = $this->request->param('catid/d', 0);
            $category = getCategory($catid);
            
            if (empty($category)) {
                $this->error('该栏目不存在！');
            }
            if ($category['type'] == 2) {
                $modelid = $category['modelid'];
                $fieldList = $this->Cms_Model->getFieldList($modelid);

                $this->assign([
                    'catid' => $catid,
                    'fieldList' => $fieldList,
                ]);
                return $this->fetch();
            } else if ($category['type'] == 1) {
                $Page_Model = new Page_Model;
                $info = $Page_Model->getPage($catid);
                $this->assign([
                    'info' => $info,
                    'catid' => $catid,
                ]);
                return $this->fetch('singlepage');
            }

        }
    }
    
    //获取栏目子代
    public function get_childs(){
    	$catid = $this->request->post('catid/d');
    	
    	$where = new Where;
    	$where['status']=1;
    	$where['parentid']=$catid;
    	$where['modelid']=3;
    	
    	$child_list=Db::name('category')->where($where)->order(['listorder','id'])->select();
    	return json($child_list);
    }
    
    //编辑信息
    public function edit()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $data['modelFieldExt'] = isset($data['modelFieldExt']) ? $data['modelFieldExt'] : [];
            try {
                $this->Cms_Model->editModelData($data['modelField'], $data['modelFieldExt']);
            } catch (\Exception $ex) {
                $this->error($ex->getMessage());
            }
            $this->success('编辑成功！');

        } else {
            $id = $this->request->param('id/d', 0);
            $category = getCategory($catid);
            if (empty($category)) {
                $this->error('该栏目不存在！');
            }
            
            if ($category['type'] == 2) {
                $modelid = $category['modelid'];
                $fieldList = $this->Cms_Model->getFieldList($modelid, $id);             
                $this->assign([
                    'catid' => $catid,
                    'fieldList' => $fieldList,
                ]);          
                return $this->fetch();
            } else {
                return $this->fetch('singlepage');
            }

        }

    }

    //删除项目
    public function delete($ids = 0)
    {
        $ids = $this->request->param('ids/a', null);
        if (empty($ids)) {
            $this->error('参数错误！');
        }
        if (!is_array($ids)) {
            $ids = array(0 => $ids);
        }
        try {
            $this->Product_Model->deleteModelData($ids);
        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
        }
        $this->success('删除成功！');
    }


    /**
     * 排序
     */
    public function listorder()
    {
        $id = $this->request->param('id/d', 0);
        $listorder = $this->request->param('value/d', 0);
        if (Db::name('product')->where('id', $id)->update(['listorder' => $listorder])) {
            $this->success("排序成功！");
        } else {
            $this->error("排序失败！");
        }
    }

    /**
     * 状态
     */
    public function setstate()
    {
        $id = $this->request->param('id/d', 0);
        $status = $this->request->param('status/s') === 'true' ? 1 : 0;
        if (Db::name('product')->where('id', $id)->update(['status' => $status])) {
            $this->success('操作成功！');
        } else {
            $this->error('操作失败！');
        }
    }

}
