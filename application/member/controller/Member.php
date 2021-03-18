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
// | 会员管理
// +----------------------------------------------------------------------
namespace app\member\controller;

use app\common\controller\Adminbase;
use app\member\model\Member as Member_Model;
use think\Db;
use think\db\Where;

class Member extends Adminbase
{
    //初始化
    protected function initialize()
    {
        parent::initialize();
        $this->Member_Model = new Member_Model;
        $this->groupCache = cache("Member_Group"); //会员模型
    }

    /**
     * 会员列表
     */
    public function manage()
    {
        if ($this->request->isAjax()) {
        	$data = $this->request->param();
        	
    	    $where = new Where;
	        $where['status']=1;
	        if($data['username']){
	        	$where['username']=array("like","%".$data['username']."%");
	        }
	        if($data['mobile']){
	        	$where['mobile']=$data['mobile'];
	        }
	        if($data['min_time']){
	        	$where['reg_time']=array('>=',strtotime($data['min_time']));
	        } 
	        if($data['max_time']){
	        	$where['reg_time']=array('<',strtotime($data['max_time'])+24*3600);
	        }


            $limit = $this->request->param('limit/d', 10);
            $page = $this->request->param('page/d', 10);
            $_list = $this->Member_Model->where($where)->page($page, $limit)->select()->withAttr('reg_ip', function ($value, $data) {
                return long2ip($value);
            })->withAttr('last_login_time', function ($value, $data) {
                return time_format($value);
            })->withAttr('avatar', function ($value, $data) {
                return "http://".$_SERVER['SERVER_NAME'].get_avatar_path($value);
            });       
 
            foreach($_list as $k=>$v){
            	switch($v['groupid']){
            		case 0:
            		$_list[$k]['groupname']='禁止访问';
            		break;
            		case 1:
            		$_list[$k]['groupname']='普通会员';
            		break;
            		case 2:
            		$_list[$k]['groupname']='中级会员';
            		break;
            		case 3:
            		$_list[$k]['groupname']='高级会员';
            		break;
            		case 4:
            		$_list[$k]['groupname']='特级会员';
            		break;
            	}
            }
            $total = $this->Member_Model->where($where)->count();
            $result = array("code" => 0, "count" => $total, "data" => $_list);
            return json($result);

        }
        return $this->fetch();
    }
    

    /**
     * 会员增加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            $result = $this->validate($data, 'member');
            if (true !== $result) {
                return $this->error($result);
            }
            $userid = $this->Member_Model->userRegister($data['username'], $data['password'], $data['email']);
            if ($userid > 0) {
                unset($data['username'], $data['password'], $data['email']);
                if (false !== $this->Member_Model->save($data, ['id' => $userid])) {
                    $this->success("添加会员成功！", url("member/manage"));
                } else {
                    //service("Passport")->userDelete($memberinfo['userid']);
                    $this->error("添加会员失败！");
                }
            }
        } else {
            foreach ($this->groupCache as $g) {
//              if (in_array($g['id'], array(8, 1, 7))) {
//                  continue;
//              }
                $groupCache[$g['id']] = $g['name'];
            }
            $this->assign('groupCache', $groupCache);
            return $this->fetch();
        }
    }
    
    
    /**
     * 会员编辑
     */
    public function edit()
    {
        if ($this->request->isPost()) {
            $userid = $this->request->param('id/d', 0);
            $data = $this->request->post();
            $result = $this->validate($data, 'member.edit');
            if (true !== $result) {
                return $this->error($result);
            }
            //获取用户信息
            $userinfo = Member_Model::get($userid);
            if (empty($userinfo)) {
                $this->error('该会员不存在！');
            }
            //修改基本资料
            if ($userinfo['username'] != $data['username'] || !empty($data['password']) || $userinfo['email'] != $data['email']) {
                $res = $this->Member_Model->userEdit($userinfo['username'], '', $data['password'], $data['email'], 1);
                if (!$res) {
                    $this->error($this->Member_Model->getError());
                }
            }
            unset($data['username'], $data['password'], $data['email']);
            //更新除基本资料外的其他信息
            if (false === $this->Member_Model->allowField(true)->save($data, ['id' => $userid])) {
                $this->error('更新失败！');
            }
            $this->success("更新成功！", url("member/manage"));

        } else {
            $userid = $this->request->param('id/d', 0);
            $data = $this->Member_Model->where(["id" => $userid])->find();
            if (empty($data)) {
                $this->error("该会员不存在！");
            }
            foreach ($this->groupCache as $g) {
//              if (in_array($g['id'], array(8, 1, 7))) {
//                  continue;
//              }
                $groupCache[$g['id']] = $g['name'];
            }
            $this->assign('groupCache', $groupCache);
            $this->assign("data", $data);
            return $this->fetch();
        }
    }

    /**
     * 会员删除
     */
    public function delete()
    {
        $ids = $this->request->param('ids/a', null);
        if (empty($ids)) {
            $this->error('请选择需要删除的会员！');
        }
        if (!is_array($ids)) {
            $ids = array(0 => $ids);
        }
        foreach ($ids as $uid) {
            $info = $this->Member_Model->find($uid);
            if (!empty($info)) {
                $this->Member_Model->userDelete($uid);
            }
        }
        $this->success("删除成功！");

    }
    
    /**
     * 导出全部会员
     */
    public function export(){
    	$data = $this->request->param();
        	
	    $where = new Where;
        $where['status']=1;
        if($data['username']){
        	$where['username']=array("like","%".$data['username']."%");
        }
        if($data['mobile']){
        	$where['mobile']=$data['mobile'];
        }
        if($data['min_time']){
        	$where['reg_time']=array('>=',strtotime($data['min_time']));
        } 
        if($data['max_time']){
        	$where['reg_time']=array('<',strtotime($data['max_time'])+24*3600);
        }
        
        $count= $this->Member_Model->where($where)->count();
        if(!$count){
        	$result = array("code" => 0, "msg" => '没有数据');
            return json($result);
        }
        
        $_list = $this->Member_Model->where($where)->select()->withAttr('reg_ip', function ($value, $data) {
            return long2ip($value);
        })->withAttr('last_login_time', function ($value, $data) {
            return time_format($value);
        })->withAttr('avatar', function ($value, $data) {
            return "http://".$_SERVER['SERVER_NAME'].get_avatar_path($value);
        });         
        foreach($_list as $k=>$v){
        	switch($v['groupid']){
        		case 0:
        		$_list[$k]['groupname']='禁止访问';
        		break;
        		case 1:
        		$_list[$k]['groupname']='普通会员';
        		break;
        		case 2:
        		$_list[$k]['groupname']='中级会员';
        		break;
        		case 3:
        		$_list[$k]['groupname']='高级会员';
        		break;
        		case 4:
        		$_list[$k]['groupname']='特级会员';
        		break;
        	}
        }
        $result = array("code" => 1, "msg" => '', "data" => $_list);
        return json($result);
    }
    
    
    /**
     * 审核会员
     */
    public function userverify()
    {
        if ($this->request->isAjax()) {
            $limit = $this->request->param('limit/d', 10);
            $page = $this->request->param('page/d', 10);
            $_list = $this->Member_Model->where('status', '<>', 1)->page($page, $limit)->select()->withAttr('reg_ip', function ($value, $data) {
                return long2ip($value);
            })->withAttr('last_login_time', function ($value, $data) {
                return time_format($value);
            });
            $total = count($_list);
            $result = array("code" => 0, "count" => $total, "data" => $_list);
            return json($result);

        }
        return $this->fetch();
    }

    /**
     * 审核会员
     */
    public function pass()
    {
        $ids = $this->request->param('ids/a', null);
        if (empty($ids)) {
            $this->error('请选择需要审核的会员！');
        }
        if (!is_array($ids)) {
            $ids = array(0 => $ids);
        }
        foreach ($ids as $uid) {
            $info = Member_Model::where('id', $uid)->update(['status' => 1]);
        }
        $this->success("审核成功！");
    }

}
