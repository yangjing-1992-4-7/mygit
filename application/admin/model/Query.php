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
// | 后台配置模型
// +----------------------------------------------------------------------
namespace app\admin\model;
use \think\Model;
use \think\Db;

class Query extends Model
{

    public function get_query_list($limit,$page){
        $list= Db::name('tj') 
            ->page($page,$limit)           
            ->withAttr('addtime', function ($value, $data) {
            	if($value){
            		return date('Y-m-d H:i:s', $value);
            	}else{
            		return '';
            	}        
            })
            ->order('addtime','desc')
            ->select();
   
        return $list;
    }
    
    public function deleteQuery()
    {
        $id = (int) $id;
        if (empty($id)) {
            $this->error = '请指定需要删除的用户ID！';
            return false;
        }

        if (false !== $this->where(array('id' => $id))->delete()) {
            return true;
        } else {
            $this->error = '删除失败！';
            return false;
        }
    }
    
    
    
}    
   
?>