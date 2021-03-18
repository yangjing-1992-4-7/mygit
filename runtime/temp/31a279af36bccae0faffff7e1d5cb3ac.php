<?php /*a:2:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\member\view\member\edit.html";i:1615875769;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">编辑会员</div>
    <div class="layui-card-body">
        <form class="layui-form form-horizontal" action='' method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                    <input type="text" name="username" autocomplete="off" placeholder="用户名" class="layui-input" value="<?php echo htmlentities($data['username']); ?>" readonly="readonly">
                </div>
                <div class="layui-form-mid layui-word-aux">6-20位字符，可由字母和数字，下划线"_"及破折号"-"组成。</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                    <input type="text" name="nickname" autocomplete="new-password" placeholder="昵称" class="layui-input" value="<?php echo htmlentities($data['nickname']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-inline">
                    <input type="text" name="mobile" autocomplete="new-password" placeholder="手机号" class="layui-input" value="<?php echo htmlentities($data['mobile']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-inline">
                    <input type="text" name="email" autocomplete="new-password" placeholder="邮箱" class="layui-input" value="<?php echo htmlentities($data['email']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                    <input type="password"   name="password" autocomplete="new-password" placeholder="密码" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">6-20位字符，可由字母和数字，下划线"_"及破折号"-"组成。</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                    <input type="password" name="password_confirm" autocomplete="new-password" placeholder="确认密码" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">请再次输入您的密码</div>
            </div>
            <div class="layui-form-item web_list">
                <label class="layui-form-label">会员组</label>
                    <div class="layui-input-inline">
                        <?php  echo \util\Form::select($groupCache,$data['groupid'], 'name="groupid"', '')  ?>
                    </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">会员头像</label>
                <div class="layui-form-field-label">
                    <div class="js-upload-image">
                        <?php echo \util\Form::images('avatar','',$data['avatar']) ?>
                    </div>
                </div>
            </div>
            <style>
            	#picker_avatar{
            		padding-left: 110px;
            	}
            </style>
            <!--<div class="layui-form-item">
                <label class="layui-form-label">积分点数</label>
                <div class="layui-input-inline">
                    <input type="text" name="point" autocomplete="off" placeholder="积分点数" class="layui-input" value="<?php echo htmlentities($data['point']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux"> 请输入积分点数，积分点数将影响会员用户组</div>
            </div>-->
            <input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>">
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <input type="button" value="立即提交"  class="layui-btn ajax-post" lay-submit lay-filter="*" target-form="form-horizontal" />
                    <input type="button" value="返回" class="layui-btn layui-btn-normal" onclick="javascript :history.back(-1);" />
                </div>
            </div>
        </form>
    </div>
</div>

    
<script type="text/javascript" src="/yzn/public/static/admin/js/common.js"></script>

</body>

</html>