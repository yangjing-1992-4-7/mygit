<?php /*a:2:{s:71:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\adminlog\index.html";i:1615451271;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">管理日志</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
        <script type="text/html" id="toolbarDemo">
            <div class="layui-btn-container">
            <button class="layui-btn layui-btn-sm layui-btn-danger" lay-event="dellog">删除一个月前日志</button>
          </div>
        </script>
        
        <script type="text/html" id="nickname">
              {{#  if(d.uid ==0){ }}
			       未登录
			  {{#  } else { }}
			     {{d.nickname}}
			  {{#  } }}
        </script>
    </div>
</div>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("admin/adminlog/index"); ?>',
        cols: [
            [
                { field: 'id', width: 80, title: 'ID', sort: true },
//              { field: 'uid', width: 80, title: '用户ID' },
                { field: 'nickname', width: 80, title: '用户名',templet: '#nickname' },
                { field: 'info', title: '提示' },
                { field: 'get', title: '操作URL' },
                { field: 'create_time', width: 180, title: '时间' },
                { field: 'ip', width: 120, title: 'IP' },
                { field: 'status', width: 80, title: '状态',align: "center", templet: '<div>{{#  if(d.status){ }} <button class="layui-btn layui-btn layui-btn-xs">成功</button> {{#  } else { }} <button class="layui-btn layui-btn-danger layui-btn layui-btn-xs">失败</button> {{#  } }} </div>' },
            ]
        ],
        page: true,
        limit:15,
        limits:[15,30,50,100],
    });

    table.on('toolbar(table)', function(obj) {
        if (obj.event === 'dellog') {
            layer.confirm('确定删除这些数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.ajax({
                    url: '<?php echo url('admin/adminlog/deletelog'); ?>',
                    type: "GET",
                    success: function(data) {
                        if (data.code == 1) {
                            if (data.url) {
                                layer.msg(data.msg + ' 页面即将自动跳转~');
                            } else {
                                layer.msg(data.msg);
                            }
                            setTimeout(function() {
                                if (data.url) {
                                    location.href = data.url;
                                } else {
                                    location.reload();
                                }
                            }, 1500);
                        } else {
                            layer.msg(data.msg);
                            setTimeout(function() {
                                if (data.url) {
                                    location.href = data.url;
                                }
                            }, 1500);
                        }
                    }
                });
            });
        }
    })
});
</script>

</body>

</html>