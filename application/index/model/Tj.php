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
// | 栏目模型
// +----------------------------------------------------------------------
namespace app\index\model;

use app\index\model\Tj as Tj_Model;
use think\facade\Cache;
use \think\Db;
use \think\Model;
use \think\db\Where;

/**
 * 模型
 */
class Tj extends Model{	
    //获取文章列表
    public function  add_tj($data=array()){
    	$data['addtime']=time();
    	$result=$this->save($data);
        
    	return $result;
    }
    
    
}
