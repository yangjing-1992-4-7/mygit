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
use app\cms\model\Page as Page_Model;
use app\common\controller\Adminbase;
use think\Db;
use think\db\Where;

class Cms extends Adminbase
{
    protected function initialize()
    {
        parent::initialize();
        $this->Cms_Model = new Cms_Model;
    }

    public function index()
    {   
    	
        return $this->fetch();
    }

    //栏目信息列表
    public function classlist()
    {
        $catid = $this->request->param('catid/d', 0);
        //当前栏目信息
        $catInfo = getCategory($catid);
        if (empty($catInfo)) {
            $this->error('该栏目不存在！');
        }
        //栏目所属模型
        $modelid = $catInfo['modelid'];
        if ($this->request->isAjax()) {
            $limit = $this->request->param('limit/d', 10);
            $page = $this->request->param('page/d', 10);
            $map = $this->buildparams();
            //检查模型是否被禁用
            if (!getModel($modelid, 'status')) {
                $this->error('模型被禁用！');
            }
            $modelCache = cache("Model");
            $tableName = $modelCache[$modelid]['tablename'];
            $total = Db::name(ucwords($tableName))->where($map)->where('catid', $catid)->count();
            $list = Db::name(ucwords($tableName))->page($page, $limit)->where($map)->where('catid', $catid)->alias('article')
			->leftjoin('attachment','article.image=attachment.id')			
	        ->field('article.*,attachment.path')
			->order(['listorder'=>'asc','updatetime' => 'desc'])->select();
            
            $_list = [];
            foreach ($list as $k => $v) {
                $v['updatetime'] = date('Y-m-d H:i:s', $v['updatetime']);
                $v['url'] = buildContentUrl($v['catid'], $v['id']);
                if($v['path']){
	            	$v['path']=config('public_url').'uploads/'.$v['path'];
	            }
                $_list[] = $v;
            }
            $result = array("code" => 0, "count" => $total, "data" => $_list);
            return json($result);
        }
        /*移动栏目 复制栏目*/
        $tree = new \util\Tree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $categorys = array();
        $result = Db::name('category')->order(array('listorder', 'id' => 'ASC'))->select();
        foreach ($result as $k => $v) {
            if ($v['type'] != 2) {
                continue;
            }
            
            if ($modelid && $modelid != $v['modelid'] && $v['child'] == 0) {
                continue;
            }
            $v['disabled'] = $v['child'] ? 'disabled' : '';
            $v['selected'] = $k == $catid ? 'selected' : '';
            $categorys[$k] = $v;
        }
        $str = "<option value='\$id' \$selected \$disabled>\$spacer \$catname</option>";
        $tree->init($categorys);
        $string = $tree->get_tree(0, $str);

        $this->assign('string', $string);
        $this->assign('catid', $catid);
        return $this->fetch();
    }
    
    /**
     * 导出全部文章
     */
    public function export(){
    	$catid = $this->request->param('catid/d'); 
        if($catid){
        	//当前栏目信息
	        $catInfo = getCategory($catid);
	        if (empty($catInfo)) {
	            $this->error('该栏目不存在！');
	        }
	        //栏目所属模型
	        $modelid = $catInfo['modelid'];
	        	
		    $map = $this->buildparams();
	        //检查模型是否被禁用
	        if (!getModel($modelid, 'status')) {
	            $this->error('模型被禁用！');
	        }
	        $modelCache = cache("Model");
	        $tableName = $modelCache[$modelid]['tablename'];
	        $count = Db::name(ucwords($tableName))->where($map)->where('catid', $catid)->count();
	        if(!$count){
	        	$result = array("code" => 0, "msg" =>'没有数据' );
                return json($result);
	        }
	        $list = Db::name(ucwords($tableName))->where($map)->where('catid', $catid)->alias('table')
			->leftjoin('attachment','table.image=attachment.id')
			->leftjoin(ucwords($tableName).'_data','table.id='.ucwords($tableName).'_data.did')			
	        ->field('table.*,attachment.path,'.ucwords($tableName).'_data.content')
			->order(['listorder'=>'asc','updatetime' => 'desc'])->select();
        }else{
        	$count = Db::name('article')->where($map)->count();
	        if(!$count){
	        	$result = array("code" => 0, "msg" =>'没有数据' );
                return json($result);
	        }
        	$list = Db::name('article')->where($map)->alias('article')
			->leftjoin('attachment','article.image=attachment.id')
			->leftjoin('article_data','article.id=article_data.did')			
	        ->field('article.*,attachment.path,article_data.content')
			->order(['listorder'=>'asc','updatetime' => 'desc'])->select();
        }
        
        $_list = [];
        foreach ($list as $k => $v) {
        	$value=[];
        	$value[]=$v['id'];
        	$value[]=$v['title'];
        	if($v['path']){
        		$value[]="http://".$_SERVER['SERVER_NAME'].config('public_url').'uploads/'.$v['path'];
        	}else{
        		$value[]="空";
        	}
        	$value[]=str_replace(PHP_EOL, '', '"'.$v['content'].'"');
        	$value[]=$v['hits'];
        	$value[]=date('Y-m-d H:i:s', $v['updatetime']);
        	$value[]=date('Y-m-d H:i:s', $v['inputtime']);
        	$value[]=$v['keywords'];
        	$value[]=str_replace(PHP_EOL, '', $v['description']);
        	$value[]=str_replace(',','，',$v['tags']);
            $_list[] = $value;
        }
        $result = array("code" => 1, "msg" =>'' , "data" => $_list);
        return json($result);
    }
    

    //移动文章
    public function remove()
    {
        if ($this->request->isPost()) {
            $catid = $this->request->param('catid/d', 0);
            if (!$catid) {
                $this->error("请指定栏目！");
            }
            //需要移动的信息ID集合
            $ids = $this->request->param('ids/s');
            //目标栏目
            $tocatid = $this->request->param('tocatid/d', 0);
            if ($ids) {
                if ($tocatid == $catid) {
                    $this->error('目标栏目和当前栏目是同一个栏目！');
                }
                $modelid = getCategory($tocatid, 'modelid');
                if (!$modelid) {
                    $this->error('该模型不存在！');
                }
                $ids = array_filter(explode('|', $ids), 'intval');
                $tableName = Db::name('model')->where('id', $modelid)->where('status', 1)->value('tablename');
                if (!$tableName) {
                    return $this->error('模型被冻结不可操作~');
                }
                if (Db::name(ucwords($tableName))->where('id', 'in', $ids)->update(['catid' => $tocatid])) {
                    $this->success('栏目修改成功~');
                } else {
                    $this->error('栏目修改失败~');
                }
            } else {
                $this->error('请选择需要移动的信息！');
            }

        }

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
            $catid = $this->request->param('catid/d', 0);
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

    //删除
    public function delete($ids = 0)
    {
        $catid = $this->request->param('catid/d', 0);
        $ids = $this->request->param('ids/a', null);
        if (empty($ids) || !$catid) {
            $this->error('参数错误！');
        }
        if (!is_array($ids)) {
            $ids = array(0 => $ids);
        }
        $modelid = getCategory($catid, 'modelid');
        try {
            $this->Cms_Model->deleteModelData($modelid, $ids);
        } catch (\Exception $ex) {
            $this->error($ex->getMessage());
        }
        $this->success('删除成功！');
    }

    //面板
    public function panl()
    {   
    	$where=new Where;
    	$where['modelid']=array('in',[0,1]);
    	$where['type']=array('in',[1,2]);
    	
    	
        $info['category'] = Db::name('Category')->where($where)->count();
        $info['model'] = Db::name('Model')->where(['module' => 'cms'])->count();
        $info['tags'] = Db::name('Tags')->count();
        $info['doc'] = Db::name('article')->count();
//      $modellist = cache('Model');
//      foreach ($modellist as $model) {
//          if ($model['module'] !== 'cms') {
//              continue;
//          }
//          $tmp = Db::name($model['tablename'])->count();
//          $info['doc'] += $tmp;
//      }
        $this->assign('info', $info);
        return $this->fetch();
    }

    //显示栏目菜单列表
    public function public_categorys()
    {
        $json = [];
        $categorys = cache('Category');
        
        foreach ($categorys as $rs) {
        	//只展示单页和文章列表
        	if($rs['modelid']==0||$rs['modelid']==1){
        		$rs = getCategory($rs['id']);
	            //剔除无子栏目外部链接
	            if ($rs['type'] == 3 && $rs['child'] == 0) {
	                continue;
	            }
	            $data = array(
	                'id' => $rs['id'],
	                'parentid' => $rs['parentid'],
	                'catname' => $rs['catname'],
	                'type' => $rs['type'],
	            );
	            //终极栏目
	            if ($rs['child'] == 0) {
	                $data['target'] = 'right';
	                $data['url'] = url('cms/cms/classlist', array('catid' => $rs['id']));
	            } else {
	                $data['isParent'] = true;
	            }
	            //单页
	            if ($rs['type'] == 1) {
	                $data['target'] = 'right';
	                $data['url'] = url('cms/cms/add', array('catid' => $rs['id']));
	            }
	            $json[] = $data;
        	}
        }
        $this->assign('json', json_encode($json));
        return $this->fetch();
    }

    /**
     * 排序
     */
    public function listorder()
    {
        $catid = $this->request->param('catid/d', 0);
        $id = $this->request->param('id/d', 0);
        $listorder = $this->request->param('value/d', 0);
        $modelid = getCategory($catid, 'modelid');
        $modelCache = cache("Model");
        if (empty($modelCache[$modelid])) {
            return false;
        };
        $tableName = $modelCache[$modelid]['tablename'];
        if (Db::name($tableName)->where('id', $id)->update(['listorder' => $listorder])) {
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
        $catid = $this->request->param('catid/d', 0);
        $id = $this->request->param('id/d', 0);
        $status = $this->request->param('status/s') === 'true' ? 1 : 0;
        $modelid = getCategory($catid, 'modelid');
        $modelCache = cache("Model");
        if (empty($modelCache[$modelid])) {
            return false;
        };
        $tableName = ucwords($modelCache[$modelid]['tablename']);
        if (Db::name($tableName)->where('id', $id)->update(['status' => $status])) {
            //更新栏目缓存
            cache('Category', null);
            getCategory($id, '', true);
            $this->success('操作成功！');
        } else {
            $this->error('操作失败！');
        }
    }

}
