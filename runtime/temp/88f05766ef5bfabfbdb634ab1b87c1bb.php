<?php /*a:2:{s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\setting\index.html";i:1615865866;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <meta name="author" content="YZNCMS">
    <link rel="stylesheet" href="/yzn/public/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/yzn/public/static/admin/css/admin.css">
    <link rel="stylesheet" href="/yzn/public/static/common/font/iconfont.css">
    <script src="/yzn/public/static/libs/layui/layui.js"></script>
    <script src="/yzn/public/static/libs/jquery/jquery.min.js"></script>
<script type="text/javascript">
//全局变量
var GV = {
    'image_upload_url': '<?php echo !empty($image_upload_url) ? htmlentities($image_upload_url) :  url("attachment/upload/upload", ["dir" => "images", "module" => request()->module()]); ?>',
    'file_upload_url': '<?php echo !empty($file_upload_url) ? htmlentities($file_upload_url) :  url("attachment/upload/upload", ["dir" => "files", "module" => request()->module()]); ?>',
    'WebUploader_swf': '/yzn/public/static/webuploader/Uploader.swf',
    'upload_check_url': '<?php echo !empty($upload_check_url) ? htmlentities($upload_check_url) :  url("attachment/Attachments/check"); ?>',
    'ueditor_upload_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/Ueditor/run"); ?>',
    'ueditor_grabimg_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/Attachments/geturlfile"); ?>',
};
</script>
</head>
<body class="childrenBody">
    
<div class="layui-card">
    <div class="layui-card-header">站点配置</div>
    <div class="layui-card-body">
        <form class="layui-form form-horizontal" action="" method="post">
            <div class="layui-form-item">
                <label class="">站点开关</label>
                <div class="layui-form-field-label">
                    <input type="checkbox" name="setting[web_site_status]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1 == $setting['web_site_status']): ?>checked='' <?php endif; ?>>
                </div>
                <div class="layui-form-mid layui-word-aux">站点关闭后前台将不能访问</div>
            </div>
            <div class="layui-form-item">
                <label class="">站点名称</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_name]" placeholder="请输入站点标题" class="layui-input" value="<?php echo htmlentities($setting['site_name']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">站点标题</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_title]" placeholder="请输入站点标题" class="layui-input" value="<?php echo htmlentities($setting['site_title']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">站点关键词</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_keyword]" placeholder="请输入站点关键词"  class="layui-input" value="<?php echo htmlentities($setting['site_keyword']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="">站点描述</label>
                <div class="layui-form-field-label">
                    <textarea name="setting[site_description]" placeholder="请输入站点描述" class="layui-textarea"><?php echo htmlentities($setting['site_description']); ?></textarea>
                </div>
            </div>
            <!--<div class="layui-form-item">
                <label class="">缓存时间</label>
                <div class="layui-form-field-label">
                    <input type="text" name="setting[site_cache_time]" placeholder="请输入缓存时间"  class="layui-input" value="<?php echo htmlentities($setting['site_cache_time']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">单页和详情页有效</div>
            </div>-->
            <div class="layui-form-item">
                <button class="layui-btn ajax-post" lay-submit="" lay-filter="*" target-form="form-horizontal">立即提交</button>
            </div>
        </form>
    </div>
</div>

    
<script type="text/javascript" src="/yzn/public/static/admin/js/common.js"></script>

</body>

</html>