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

class Flink extends Model
{

    public function get_flink_list($status='')
    {   
    	if($status){
    		$list= self::where('flink.status',$status)
    		->alias('flink')
            ->leftJoin('attachment','flink.image = attachment.id')
            ->field('flink.*,attachment.path')
            ->withAttr('addtime', function ($value, $data) {
            	if($value){
            		return date('Y-m-d H:i:s', $value);
            	}else{
            		return '';
            	}
                   
            })
            ->withAttr('path', function ($value, $data) {
            	if($value){
            		return config('public_url') . 'uploads/'.$value;
            	}else{
            		return '';
            	}
                   
            })
         	 
            ->order(['flink.list_order','addtime'=>'desc'])
            ->select();
    	}else{
    		$list= self::alias('flink')
            ->leftJoin('attachment','flink.image = attachment.id')
            ->field('flink.*,attachment.path')
            ->withAttr('addtime', function ($value, $data) {
            	if($value){
            		return date('Y-m-d H:i:s', $value);
            	}else{
            		return '';
            	}         	        
            })
            ->withAttr('path', function ($value, $data) {
            	if($value){
            		return config('public_url') . 'uploads/'.$value;
            	}else{
            		return '';
            	}
                   
            })
          
            ->order(['flink.list_order','addtime'=>'desc'])
            ->select();
    	}
        
        return $list;
    }
    
    public function deleteFlink($id)
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
    
    
    public function createFlink($data)
    {
        if (empty($data)) {
            $this->error = '没有数据！';
            return false;
        }
       
        $data['addtime'] = time();
        $id = $this->allowField(true)->save($data);
        if ($id) {
            return $id;
        }
        $this->error = '入库失败！';
        return false;
    }
    
    
    public function editFlink($data)
    {    
    	
        if (empty($data)) {
            $this->error = '没有数据！';
            return false;
        }

        if (false !== $this->allowField(true)->save($data, ['id' => $data['id']])) {
            return true;
        } else {
            $this->error = '编辑失败！';
            return false;
        }
    }
}    
   
?>