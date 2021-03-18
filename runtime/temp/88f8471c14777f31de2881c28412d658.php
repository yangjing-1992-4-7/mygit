<?php /*a:2:{s:64:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\cms\index.html";i:1615445825;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    
<div class="layui-row">
    <div class="layui-col-md2 layui-col-sm12" style="padding:0 10px;">
        <div class="layui-card">
            <div class="layui-card-header">栏目列表</div>
            <div class="layui-card-body">
                <iframe name="left" id="iframe_categorys" src="<?php echo url('cms/cms/public_categorys'); ?>" style="height: 100%; width: 100%;"  frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
    <div class="layui-col-md10 layui-col-sm12" style="padding:0 10px;">
        <div class="layui-card">
            <div class="layui-card-header">文章管理</div>
            <div class="layui-card-body">
                <iframe name="right" id="iframe_categorys_list" src="<?php echo url('cms/cms/panl'); ?>"  style="height: 100%; width:100%;border:none;" frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
</div>

    
<script type="text/javascript">
var B_frame_height = parent.layui.$(".iframe_box").height()-100;
//console.log(parent.layui.$(".iframe_box").height());
$(window).on('resize', function () {
    setTimeout(function () {
    B_frame_height = parent.layui.$(".iframe_box").height()-100;
        frameheight();
    }, 100);
});
function frameheight(){
  $("#iframe_categorys").height(B_frame_height);
  $("#iframe_categorys_list").height(B_frame_height);
}
(function (){
  frameheight();
})();
</script>

</body>

</html>