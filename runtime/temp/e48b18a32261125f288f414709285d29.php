<?php /*a:2:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\category\index.html";i:1615517916;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">栏目管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <blockquote class="layui-elem-quote">添加、修改栏目全部完成后，更新栏目缓存！</blockquote>
            <table class="layui-hide" id="table" lay-filter="table"></table>
        </div>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
      <a class="layui-btn layui-btn-sm" href="<?php echo url('cms/category/add'); ?>">新增栏目</a>
      <a class="layui-btn layui-btn-sm" href="<?php echo url('cms/category/singlepage'); ?>">新增单页</a>
      <!--<a class="layui-btn layui-btn-sm" href="<?php echo url('cms/category/wadd'); ?>">新增外部链接</a>-->
      <a class="layui-btn layui-btn-sm layui-btn-danger" lay-event="public_cache">更新栏目缓存<span class="layui-badge-dot layui-bg-orange"></span></a>
    </div>
</script>
<script type="text/html" id="barTool">
	{{# if(d.type==2){ }}
	    <a href="{{d.add_url}}" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="add">添加子栏目</a>
	{{# }else{ }}
	    <div   style="width: 70px;height: 22px;float: left;margin-right: 12px;"></div>
	{{# } }}
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="status" {{ d.status==1 ? 'checked' : '' }}>
</script>

<script type="text/html" id="imgTool">
    <div style="height:100%;">
    	{{#  if(d.path){  }}
    	<img src="{{ d.path }}" style="height:100%;"/>
    	{{#  } }}
    </div>
</script>


<div id="Layer1" style="display:none;position:absolute;z-index:1;"></div> 
<style>
    #Layer1 img{
    	max-width: 150px;
    }
</style>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("cms/category/index"); ?>',
        cols: [
            [
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
//              { field: 'id', width: 70, title: 'ID' },
                { field: 'catname',width: 180, title: '栏目名称' },
                { field: 'modelname',width: 180, title: '所属模型' },
                { field: 'catdir', width: 120, title: '唯一标识' },
                { field: 'type',width: 100, title: '栏目类型',templet: '<div>{{#  if(d.type==1){ }} 单页 {{#  } else if(d.type==2){  }} 列表 {{#  } else if(d.type==3){ }} 链接 {{#  } else { }} 未知 {{#  } }}</div>' },
                { field: 'path', title: '栏目图片' ,templet:'#imgTool'},
//              { field: 'url',width: 60,align:"center", title: 'URL',templet:'<div><a href="{{ d.url }}" target="_blank"><i class="iconfont icon-lianjie"></i></a></div>'},
                { field: 'status',  width: 100,align:"center", title: '状态',  templet: '#statusTpl', unresize: true },
                { fixed: 'right', width: 200, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });

    //监听单元格编辑
    table.on('edit(table)', function(obj) {
        var value = obj.value,data = obj.data;
        $.post('<?php echo url("cms/category/listorder"); ?>', { 'id': data.id,'value':value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                layer.msg(data.msg);
            }

        })
    });

    table.on('toolbar(table)', function(obj) {
        if (obj.event === 'public_cache') {
            $.ajax({
                url: '<?php echo url("cms/category/public_cache"); ?>',
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
        }
    })

        //监听状态操作
    form.on('switch(status)', function(obj) {
        var _this = $(obj.elem);
        $.post('<?php echo url("cms/category/setstate"); ?>', { 'id': this.value,'status':obj.elem.checked}, function(data) {
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
        console.log(obj);
        if (obj.event === 'del') {
            layer.confirm('确定删除这条数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.post('<?php echo url("cms/category/delete"); ?>', { 'id': data.id }, function(data) {
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
            window.open('<?php echo url("cms/category/edit"); ?>' + "?id=" + data.id, '_self')
        }
    });
}); 

</script>
<script>
	$(document).delegate(".layui-table-cell img","mousemove",function(event){
	    x = event.pageX +20; 
		y = event.pageY +20; 
		document.getElementById("Layer1").style.left = x+"px"; 
		document.getElementById("Layer1").style.top = y+"px"; 
		document.getElementById("Layer1").innerHTML = "<img src='" + $(this).attr("src") +"'/>"; 
		document.getElementById("Layer1").style.display = "block";
	})
	
	$(document).delegate(".layui-table-cell img","mouseout",function(){
		$("#Layer1").hide();
	})
	
</script>

</body>

</html>