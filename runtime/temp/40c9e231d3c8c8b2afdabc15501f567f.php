<?php /*a:2:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\member\view\group\index.html";i:1615884494;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">会员组列表</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="table" lay-filter="table"></table>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <a class="layui-btn layui-btn-sm" href="<?php echo url('member/group/add'); ?>">添加会员组</a>
    </div>
</script>
<script type="text/html" id="barTool">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    {{#  if(d.issystem!=1){ }}
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    {{#  } }}
</script>
<script type="text/html" id="issystem">
    {{#  if(d.issystem==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowattachment">
    {{#  if(d.allowattachment==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowpost">
    {{#  if(d.allowpost==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>

<!--<script type="text/html" id="allowpostverify">
    {{#  if(d.allowpostverify==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>-->

<script type="text/html" id="allowsendmessage">
    {{#  if(d.allowsendmessage==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowupgrade">
    {{#  if(d.allowupgrade==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="allowsearch">
    {{#  if(d.allowsearch==1){ }}
    <i class="iconfont text-success icon-success_fill"></i>
    {{#  } else { }}
    <i class="iconfont text-error icon-delete_fill"></i>
    {{#  } }}
</script>

<script type="text/html" id="imgTool">
    <div style="height:100%;">
    	{{#  if(d.path){  }}
    	<img src="{{ d.path }}" style="height:25px;width: 25px;border-radius:50%;"/>
    	{{#  } }}
    </div>
</script>

<div id="Layer1" style="display:none;position:absolute;z-index:1;"></div> 
<style>
    #Layer1 img{
    	width: 150px;height: 150px;border-radius: 50%;
    }
</style>

    
<script type="text/javascript" src="/yzn/public/static/admin/js/common.js"></script>
<script>
 
    	
	
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("member/group/index"); ?>',
        cols: [
            [
                { field: 'id', width: 80, title: 'ID' },
//              { field: 'listorder', width: 100, title: '排序',edit:'text' },
                { field: 'name', width: 100, title: '会员组名' },
//              { field: 'issystem', width: 100,  title: '系统组',align:"center",templet: '#issystem' },
                { field: '_count', width: 100,align:"center", title: '会员数' },
//              { field: 'starnum',width: 100,align:"center",  title: '星星数' },
                { field: 'allowattachment', width: 180,align:"center", title: '允许上传附件',templet: '#allowattachment' },
                { field: 'allowpost', width: 180, title: '允许发布信息',align:"center",templet: '#allowpost' },
//              { field: 'allowpostverify', width: 120, title: '投稿不需审核',align:"center",templet: '#allowpostverify' },
                { field: 'allowsearch', width: 180, title: '搜索权限',align:"center",templet: '#allowsearch' },
//              { field: 'allowupgrade', width: 120, title: '自助升级',align:"center",templet: '#allowupgrade' },
                { field: 'allowsendmessage', width: 180, title: '发短消息',align:"center",templet: '#allowsendmessage'  },
                { field: 'path', width: 120,  title: '会员组图标' ,align:"center",templet:'#imgTool'},
                { field: 'description', title: '会员组简介' ,align:"center" },
                { fixed: 'right',width: 120,   title: '操作', templet: '#barTool' }
            ]
        ]
    });

        //监听行工具事件
    table.on('tool(table)', function(obj) {
        var data = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除这条数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.post('<?php echo url("member/group/delete"); ?>', { 'id': data.id }, function(data) {
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
            window.open('<?php echo url("member/group/edit"); ?>' + "?id=" + data.id, '_self')
        }
    });

});

//权限切换
$(document).on("click",".layui-table-cell .iconfont",function(){
	var self=$(this);
	var target=$(this).parents("td").attr("data-field");
	var value=$(this).parents("td").attr("data-content");
	var id=$(this).parents("tr").find("td[data-field='id']").children("div").text();
    $.ajax({
    	type:"post",
    	url:"<?php echo url('group/role_edit'); ?>",
    	async:true,
    	data:{'target': target,'value':value,'id':id },
    	dataType:'json',
    	success:function(data){
    		if(data.code=='success'){
    			if(data.data==1){
    				self.removeClass("text-error");
    				self.removeClass("icon-delete_fill");
    				self.addClass("text-success");
    				self.addClass("icon-success_fill");
    			}else if(data.data==0){
    				self.removeClass("text-success");
    				self.removeClass("icon-success_fill");
    				self.addClass("text-error");
    				self.addClass("icon-delete_fill");
    			}
    			self.parents("td").attr("data-content",data.data);
    		}else if(data.code=='error'){
    			layer.msg("修改失败");
    		}else if(data.code==0){
    			layer.msg(data.msg);
    		}
    	}
    });
})
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