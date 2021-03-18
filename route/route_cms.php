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
// | CMS路由
// +----------------------------------------------------------------------

Route::rule('cms/index', 'cms/index/index');
Route::rule('cms/lists/:catid/[:condition]', 'cms/index/lists')->pattern(['catid' => '\d+', 'condition' => '[0-9_&=a-zA-Z]+']);
Route::rule('cms/shows/:catid/:id', 'cms/index/shows')->pattern(['catid' => '\d+', 'id' => '\d+']);
Route::rule('cms/tag/[:tag]', 'cms/index/tags');
Route::rule('cms/search/<keyword?>/[:modelid]/[:time]', 'cms/index/search')->pattern(['keyword' => '\w+', 'modelid' => '\d+', 'time' => '\w+']);

Route::rule('trademark', 'index/index/trademark');
Route::rule('col', 'index/index/col');
Route::rule('copyright', 'index/index/copyright');
Route::rule('property', 'index/index/property');
Route::rule('enterprise', 'index/index/enterprise');
Route::rule('qualifications', 'index/index/qualifications');
Route::rule('capital', 'index/index/capital');
Route::rule('news', 'index/index/news');
Route::rule('news/id/[:id]', 'index/index/news');
Route::rule('news_info/id/:id', 'index/index/news_info');
Route::rule('place', 'index/index/place');
Route::rule('place/place/[:place]', 'index/index/place');
Route::rule('search/[:keyword]', 'index/index/search');



Route::rule('index_wap', 'index/index_wap/index_wap');
Route::rule('trademark_wap', 'index/index_wap/trademark_wap');
Route::rule('col_wap', 'index/index_wap/col_wap');
Route::rule('copyright_wap', 'index/index_wap/copyright_wap');
Route::rule('property_wap', 'index/index_wap/property_wap');
Route::rule('enterprise_wap', 'index/index_wap/enterprise_wap');
Route::rule('qualifications_wap', 'index/index_wap/qualifications_wap');
Route::rule('capital_wap', 'index/index_wap/capital_wap');
Route::rule('news_wap', 'index/index_wap/news_wap');
Route::rule('news_wap/id/:id', 'index/index_wap/news_wap');
Route::rule('news_info_wap/id/:id', 'index/index_wap/news_info_wap');
Route::rule('place_wap', 'index/index_wap/place_wap');
Route::rule('place_wap/place/[:place]', 'index/index_wap/place_wap');
Route::rule('search_wap/[:keyword]', 'index/index_wap/search_wap');

//如果想要直接绑定域名 不加cms后缀 直接注释上面代码 如以下代码
//Route::rule('/', 'cms/index/index');
//Route::rule('index', 'cms/index/index');
//Route::rule('lists/:catid/[:condition]', 'cms/index/lists')->pattern(['catid' => '\d+', 'condition' => '[0-9_&=a-zA-Z]+']);
//更多...
//更个性化的地址请参考TP手册路由章节

//最后重要提示
//务必【更新栏目缓存】和【一键清理缓存】
