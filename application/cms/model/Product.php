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
// | CMS模型
// +----------------------------------------------------------------------
namespace app\cms\model;

use app\common\model\Modelbase;
use think\Db;
use think\facade\Validate;
use \think\Model;

/**
 * 模型
 */
class Product extends Modelbase
{
 
    //删除项目
    public function deleteModelData($ids)
    {
        if (is_array($ids)) {
            try {
                $result=Db::name('product')->where('id', 'in', $ids)->delete();
                if ($result) {
                    Db::name('product_data')->where('did', 'in', $ids)->delete();
                }
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        } else {
            try {
                $result=Db::name('product')->where('id', $ids)->delete();
                if ($result) {
                    Db::name('product_data')->where('did', $ids)->delete();
                }
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }
    }

}
