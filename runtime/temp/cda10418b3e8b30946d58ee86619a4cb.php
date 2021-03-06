<?php /*a:2:{s:67:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\models\index.html";i:1615518637;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">模型列表</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <a class="layui-btn layui-btn-sm" href="<?php echo url('cms/models/add'); ?>">添加模型</a>
    </div>
</script>
<script type="text/html" id="barTool">
	<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="field">字段管理</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="status" {{ d.status==1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="ifsubTpl">
    {{#  if(d.setting.ifsub==1){ }}
    启用
    {{#  } else { }}
    禁用
    {{#  } }}
</script>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("cms/models/index"); ?>',
        cols: [
            [
                { field: 'id', width: 80, title: '模型ID' },
                { field: 'name', width: 120, title: '模型名称' },
                { field: 'tablename', width:120,title: '数据表' },
                { field: 'description', title: '描述' },
                { field: 'type', width:120,title: '类型',templet: '<div>{{#  if(d.type==1){ }} 独立表 {{#  } else { }} 主附表 {{#  } }} </div>' },
                { field: 'create_time',width:180, title: '创建时间' },
                { field: 'status', width: 100, title: '状态', templet: '#statusTpl', unresize: true },
//              { field: 'ifsub', width: 80, title: '投稿', templet: '#ifsubTpl'},
                { fixed: 'right', title: '操作', width: 200, templet: '#barTool' }
            ]
        ]
    });

        //监听状态操作
    form.on('switch(status)', function(obj) {
        var _this = $(obj.elem);
        $.post('<?php echo url("cms/models/setstate"); ?>', { 'id': this.value,'status':obj.elem.checked}, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                !obj.elem.checked ? _this.prop('checked',true) : _this.removeAttr('checked');
                form.render('checkbox');
                layer.msg(data.msg);
            }

        });
    });


    //监听行工具事件
    table.on('tool(table)', function(obj) {
        var data = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除这条数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.post('<?php echo url("cms/models/delete"); ?>', { 'id': data.id }, function(data) {
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

                });
            });
        }else if (obj.event === 'edit') {
            window.open('<?php echo url("cms/models/edit"); ?>' + "?id=" + data.id, '_self')
        }else if (obj.event === 'field') {
            window.open('<?php echo url("cms/field/index"); ?>' + "?id=" + data.id, '_self')
        }
    });
});
</script>

</body>

</html>