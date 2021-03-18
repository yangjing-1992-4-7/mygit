<?php /*a:2:{s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\flink\index.html";i:1615451551;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">友情链接</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <table class="layui-hide" id="table" lay-filter="table"></table>
            <script type="text/html" id="toolbarDemo">
                <div class="layui-btn-container">
                <a class="layui-btn layui-btn-sm" href="<?php echo url('admin/flink/add'); ?>">添加友情链接</a>
              </div>
            </script>
            
            <script type="text/html" id="statusTpl">
			    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="status" {{ d.status==1 ? 'checked' : '' }}>
			</script>
			
			<script type="text/html" id="barTool">
                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
            </script>
            
            <script type="text/html" id="imgTool">
                <div style="height:100%;">
                	{{#  if(d.path){  }}
                	   <img src="{{ d.path }}" style="height:100%;"/>
                	{{#  } }}
                </div>
            </script>
        </div>
    </div>
</div>

<div id="Layer1" style="display:none;position:absolute;z-index:1;"></div> 
<style>
    
    #Layer1 img{
    	max-width: 150px;
    }
</style>

    
<script type="text/javascript">
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$;
        form = layui.form;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("admin/flink/index"); ?>',
        cols: [
            [
//              { field: 'id', width: 80, title: 'ID'},
                { field: 'list_order',width: 60, title: '排序' },
                { field: 'name', width: 120, title: '友链名称'},
                { field: 'url',  title: '链接'},
                { field: 'image',width: 120, title: '友链图片' ,templet:'#imgTool'},
                { field: 'addtime', width: 160, title: '添加时间' },
                { field: 'status',align:"center", title: '状态',  templet: '#statusTpl', unresize: true },
                
                { fixed: 'right', width: 160, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page:true,
        limit:15,
        limits:[15,30,50,100],
    });
    
    //监听状态操作
    form.on('switch(status)', function(obj) {
        var _this = $(obj.elem);
        $.post('<?php echo url("admin/flink/setstate"); ?>', { 'id': this.value,'status':obj.elem.checked}, function(data) {
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
        //console.log(obj);
        if (obj.event === 'del') {
            layer.confirm('确定删除这条数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.post('<?php echo url("admin/flink/del"); ?>', { 'id': data.id }, function(data) {
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
            window.open('<?php echo url("admin/flink/edit"); ?>' + "?id=" + data.id, '_self')
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