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
// | 后台首页
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\model\Query as Query_Model;

use app\admin\model\AdminUser;
use app\admin\service\User;
use app\common\controller\Adminbase;
use think\facade\Cache;

class Query extends Adminbase
{  
	protected function initialize(){
        parent::initialize();    
        $this->QueryModel = new Query_Model;
    }
    
    //首页
    public function index(){
    	if ($this->request->isAjax()) {
    		$limit = $this->request->param('limit/d', 10);
            $page = $this->request->param('page/d', 10);
            
            $list=$this->QueryModel->get_query_list($limit,$page);  
            $total = count($list);
            $result = array("code" => 0, "count" => $total, "data" => $list);
            return json($result);
        }
    	
    	return $this->fetch();
    }
    
     /**
     * 删除友情链接
     */
    public function del()
    {
        $id = $this->request->param('id/d');
        if ($this->FlinkModel->deleteFlink($id)) {
            $this->success("删除成功！");
        } else {
            $this->error($this->FlinkModel->getError() ?: '删除失败！');
        }
    }
    
    
    
}    	
?>