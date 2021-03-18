<?php /*a:2:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\manager\edit.html";i:1615875222;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">编辑管理员</div>
    <div class="layui-card-body">
        <form class="layui-form form-horizontal" action="<?php echo url('admin/manager/edit'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>" />
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                    <input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="用户名" class="layui-input" value="<?php echo htmlentities($data['username']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">3-20位字符，可由字母和数字，下划线"_"及破折号"-"组成。</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="密码" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">不修改留空即可。</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="password_confirm" lay-verify="password_confirm" autocomplete="off" placeholder="确认密码" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">请再次输入您的密码</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">E-mail</label>
                <div class="layui-input-inline">
                    <input type="text" name="email" lay-verify="email" autocomplete="off" placeholder="E-mail" class="layui-input" value="<?php echo htmlentities($data['email']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">填写完整邮箱，如 yzncms@163.com</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">真实姓名</label>
                <div class="layui-input-inline">
                    <input type="text" name="nickname" lay-verify="nickname" autocomplete="off" placeholder="真实姓名" class="layui-input" value="<?php echo htmlentities($data['nickname']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">权限组</label>
                <div class="layui-input-inline">
                    <select name="roleid" lay-filter="roleid">
                        <?php if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($vo['id'] == $data['roleid']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['title']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">头像</label>
                <div class="layui-form-field-label">
                    <div class="js-upload-image">
                        <?php echo \util\Form::images('image','',$data['image']) ?>
                    </div>
                </div>
            </div>
            <style>
            	#picker_image{
            		padding-left: 110px;
            	}
            </style>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="button" value="立即提交" class="layui-btn ajax-post" lay-submit="" lay-filter="*" target-form="form-horizontal">
                    <input type="button" value="返回" class="layui-btn layui-btn-normal" onClick="javascript :history.back(-1);">
                </div>
            </div>
        </form>
    </div>
</div>

    
<script type="text/javascript" src="/yzn/public/static/admin/js/common.js"></script>

</body>

</html>