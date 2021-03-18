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

use think\facade\Cache;
use \think\Db;
use \think\Model;
use \think\db\Where;

/**
 * 模型
 */
class Category extends Model{

    //获取新闻栏目
    public function get_news_category($num=0){
    	$where=new Where;
    	$where['catdir']='news';
    	$news=self::where($where)->find();
    	if($num>0){
    		$cate_list=self::where('parentid',$news['id'])->order(['listorder','id'])->limit($num)->select();    	
    	}else{
    		$cate_list=self::where('parentid',$news['id'])->order(['listorder','id'])->select();    	
    	}
    	
    	
    	return $cate_list;       
    }

}
