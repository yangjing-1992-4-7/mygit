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
// | 栏目验证
// +----------------------------------------------------------------------
namespace app\cms\validate;

use think\Validate;

class Category extends Validate
{
    //定义验证规则
    protected $rule = [
        'parentid|上级栏目' => 'require|number',
        'type|栏目类型' => 'require|in:1,2,3',
        'catname|栏目标题' => 'require|chsAlphaNum',
//      'catdir|唯一标识' => 'require|alphaNum|unique:category',
//      'image|栏目图片' => 'number',
        'listorder|栏目排序' => 'require|number',
        'url|链接地址' => 'require',
    ];

    //定义验证提示
    protected $message = [
        'modelid.number' => '所属模型不得为空',
    ];

    protected $scene = [
        'page' => ['parentid', 'type', 'catname', 'catdir', 'image', 'listorder', 'status'],
        'list' => ['parentid', 'modelid', 'type', 'catname', 'catdir', 'image', 'listorder', 'status'],
        'link' => ['parentid', 'type', 'catname', 'catdir', 'image', 'listorder', 'status', 'url'],
    ];
}
