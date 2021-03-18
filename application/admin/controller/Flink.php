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
use app\admin\model\Flink as Flink_Model;

use app\admin\model\AdminUser;
use app\admin\service\User;
use app\common\controller\Adminbase;
use think\facade\Cache;

class Flink extends Adminbase
{  
	protected function initialize(){
        parent::initialize();    
        $this->FlinkModel = new Flink_Model;
    }
    //友情链接
    public function index(){
    	if ($this->request->isAjax()) {
            $list=$this->FlinkModel->get_flink_list();             
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
    
    /**
     * 添加友情链接
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post('');
            $validate = new \app\admin\validate\Flink;
            $result = $validate->check($data);
            if (true !== $result) {
                return $this->error($validate->getError());
            }
            if ($this->FlinkModel->createFlink($data)) {
                $this->success("添加友链成功！", url('admin/flink/index'));
            } else {
                $error = $this->AdminUser->getError();
                $this->error($error ? $error : '添加失败！');
            }

        } else {
            return $this->fetch();
        }
    }
    
    
    /**
     * 编辑友情链接
     */
    public function edit()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post('');
            
            $validate = new \app\admin\validate\Flink;
            $result = $validate->check($data);
            if (true !== $result) {
                return $this->error($validate->getError());
            }
            if ($this->FlinkModel->editFlink($data)) {
                $this->success("修改成功！");
            } else {
                $this->error($this->User->getError() ?: '修改失败！');
            }
        } else {
            $id = $this->request->param('id/d');
            $data = $this->FlinkModel->where(array("id" => $id))->find();
            if (empty($data)) {
                $this->error('该信息不存在！');
            }
            $this->assign("data", $data);
            return $this->fetch();
        }
    }
    
    
    /**
     * 状态
     */
    public function setstate()
    {
        $id = $this->request->param('id/d');
        empty($id) && $this->error('参数不能为空！');
        $status = $this->request->param('status/s') === 'true' ? 1 : 0;
        if (Flink_Model::update(['status' => $status], ['id' => $id])) {
            $this->success('操作成功！');
        } else {
            $this->error('操作失败！');
        }
    }
    
}    	
?>