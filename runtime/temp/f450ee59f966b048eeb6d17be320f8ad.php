<?php /*a:2:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\cms\singlepage.html";i:1615275068;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    
<form class="layui-form form-horizontal" action="" method="post">
    <div class="layui-form-item">
        <div class="layui-form-item">
            <label class="">标题&nbsp;<font color="red">*</font></label>
            <div class="layui-form-field-label">
                <input type="text" name="modelField[title]" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['title']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="">关键词</label>
            <div class="layui-form-field-label">
                <input type="text" name="modelField[keywords]" placeholder="请输入SEO关键词" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['keywords']); ?>">
            </div>
            <div class="layui-form-mid layui-word-aux">多关键词之间用空格或者“,”隔开</div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="">描述</label>
            <div class="layui-form-field-label">
                <textarea placeholder="请输入SEO摘要" class="layui-textarea" name="modelField[description]"><?php echo htmlentities($info['description']); ?></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label>文章封面</label>
            <div class="layui-form-field-label">
                <div class="js-upload-image">
                    <?php echo \util\Form::images('image','',$info['image'],true) ?>
                </div>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="">内容</label>
            <div class="layui-form-field-label">
                <script type="text/javascript" src="/yzn/public/static/libs/ueditor/ueditor.config.js"></script>
                <script type="text/javascript" src="/yzn/public/static/libs/ueditor/ueditor.all.js"></script>
                <script type="text/javascript">
                var modelFieldExtcontent = UE.getEditor('modelFieldcontent', {
                    initialFrameWidth: null,
                    initialFrameHeight: 250,
                    serverUrl: "<?php echo url('attachment/Ueditor/run'); ?>"
                });
                </script>
                <script type="text/plain" id="modelFieldcontent" name="modelField[content]"><?php echo $info['content']; ?></script>
            </div>
        </div>
        <input type="hidden" name="modelField[catid]" value="<?php echo htmlentities($catid); ?>">
        <div>
            <button class="layui-btn ajax-post" lay-submit lay-filter="*" target-form="form-horizontal">立即提交</button>
        </div>
    </div>
</form>

    

</body>

</html>