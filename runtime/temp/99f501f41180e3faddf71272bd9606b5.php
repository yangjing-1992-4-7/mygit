<?php /*a:2:{s:71:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\member\view\member\manage.html";i:1615884540;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">
    	<form action="<?php echo url('member/manage'); ?>" method="post" class="member_form">
	    	<!--会员列表-->
	        <div class="layui-input-inline">
	            <input type="text" name="username" id='username'  style="float: left;display: inline;width: auto;margin-right: 20px;"  autocomplete="off" placeholder="用户名模糊搜索" class="layui-input">
	            <input type="text" name="mobile" id='mobile' style="float: left;display: inline;width: auto;margin-right: 20px;"  autocomplete="off" placeholder="手机号搜索" class="layui-input">
	            <div class="min_time_box" style="float: left;">
	            	<input type="text" name="min_time" id='min_time'   style="display: inline;width: auto;"  autocomplete="off" placeholder="注册时间" class="layui-input">-
	            </div>
	            <div class="max_time_box" style="float: left;margin-right: 20px;"> 
	                <input type="text" name="max_time" id='max_time'  style="display: inline;width: auto;"  autocomplete="off" placeholder="注册时间" class="layui-input">
	            </div>
	            <input type="button" value="搜索" class="layui-btn layui-btn-normal search" style="float: left;">
	        </div>
        </form>
    </div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <a class="layui-btn layui-btn-sm layui-btn-danger" lay-event="delAll">批量删除</a>
        <a class="layui-btn layui-btn-sm" href="<?php echo url('member/member/add'); ?>">添加会员</a>
        <a class="layui-btn layui-btn-sm normal" lay-event="export">导出会员</a>
    </div>
</script>
<style>
	.normal{
		background-color: #1E9FFF;
	}
</style>
<script type="text/html" id="barTool">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<script type="text/html" id="imgTool">
    <div style="height:100%;">
    	{{#  if(d.avatar){  }}
    	<img src="{{ d.avatar }}" style="height:25px;width: 25px;border-radius:50%;"/>
    	{{#  } }}
    </div>
</script>

<div id="Layer1" style="display:none;position:absolute;z-index:1;"></div> 
<style>
    #Layer1 img{
    	width: 200px;
    	height: 200px;
    	border-radius: 50%;
    }
</style>

    
<script>
var username='';
var mobile='';
var min_time='';
var max_time='';	
	
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    var t =table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("member/member/manage"); ?>',     
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
//              { field: 'id', width: 60, title: 'ID' },
                { field: 'username', width: 120, title: '用户名' },
                { field: 'avatar', width: 120,  title: '会员头像' ,align:"center",templet:'#imgTool'},
                { field: 'groupname', width: 100, title: '会员组' },
                { field: 'nickname', width: 110, title: '昵称' },
                { field: 'mobile', width: 120,  title: '手机号' },
                { field: 'email', width: 180,  title: '邮箱' },
                { field: 'reg_ip',  title: '注册IP' },
                { field: 'reg_time', title: '注册时间' },
                { field: 'amount', width: 120, title: '账户余额' },
//              { field: 'point', width: 120, title: '积分总数' },
//              { field: 'login', width: 100, title: '登录次数' },
                { fixed: 'right', width: 120, title: '操作', templet: '#barTool' }
            ]
        ],
        page:true,
        limit:15,
        limits:[15,30,50,100],
    });

        table.on('toolbar(table)', function(obj) {
        if (obj.event === 'delAll') {
            var checkStatus = table.checkStatus('table'),
                data = checkStatus.data,
                ids = [];
            if (data.length > 0) {
                for (let i in data) {
                    ids.push(data[i].id);
                }
                layer.confirm('确定删除选中的数据？', { icon: 3, title: '提示信息' }, function(index) {
                    $.post('<?php echo url("member/member/delete"); ?>', { 'ids': ids }, function(data) {
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
                    layer.close(index);
                })
            } else {
                layer.msg("请选择需要删除的数据");
            }
        } else if (obj.event === 'export') {       	
            $.ajax({
	    	  	type:"post",
	    	  	url:'<?php echo url("member/member/export"); ?>',
	    	  	async:true,
	    	  	data:{'username':username,'mobile':mobile,'min_time':min_time,'max_time':max_time},
	    	  	dataType:'json',
	    	  	success:function(data){
	    	  		if (data.code == 1) {
                        table.exportFile(t.config.id, data.data, 'xls');
                    } else {
                        layer.msg(data.msg);
                    }
	    	  		
	    	  	}
    	    });
        }
    });

    
    //监听行工具事件
    table.on('tool(table)', function(obj) {
        var data = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除这条数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.post('<?php echo url("member/member/delete"); ?>', { 'ids': data.id }, function(data) {
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
        } else if (obj.event === 'edit') {
            window.open('<?php echo url("member/member/edit"); ?>' + "?id=" + data.id, '_self')
        } 
    });
    
    
    $(".search").click(function(){
    	var $ = layui.$;
		username=  $("#username").val();
		mobile=$("#mobile").val();
		min_time=$("#min_time").val();
		max_time=$("#max_time").val();
	    table.reload('table', {
            page: {
                curr: 1 //重新从第 1 页开始
            }
            ,where: {
                'username': username,
                'mobile':mobile,
                'min_time':min_time,
                'max_time':max_time
            }
        })
	})
    
});
</script>
<link rel="stylesheet" href="/yzn/public/static/admin/css/date.css">
<script src="/yzn/public/static/admin/js/date.js"></script>
<script src="/yzn/public/static/admin/js/nongli.js"></script>
<script type="text/javascript">
	var min = new DateJs({
		inputEl: '#min_time',
		el: '.min_time_box'
	})
	
	var max = new DateJs({
		inputEl: '#max_time',
		el: '.max_time_box'
	})
	
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