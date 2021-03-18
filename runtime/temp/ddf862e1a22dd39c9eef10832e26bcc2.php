<?php /*a:2:{s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\cms\classlist.html";i:1615451452;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    
<style type="text/css">
.childrenBody {
    background: #fff;
}

.layui-table-box {
	min-height: 500px;
	height: 500px;
}

.layui-table-body{
	min-height: 500px;
	height: 500px;
}

</style>
<div class="layui-form">
        <blockquote class="layui-elem-quote quoteBox">
            <form class="layui-form search-from" method="get">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" id="laydate" placeholder="搜索更新时间范围">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" class="layui-input searchVal" placeholder="请输入标题">
                    </div>
                    <a class="layui-btn search_btn" data-type="reload">搜索</a>
                </div>
            </form>
        </blockquote>
    <table class="layui-hide" id="table" lay-filter="table"></table>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
      <a class="layui-btn layui-btn-sm" href="<?php echo url('cms/cms/add',['catid'=>$catid]); ?>">新增文章</a>
      <a class="layui-btn layui-btn-sm layui-btn-danger" lay-event="delAll">批量删除</a>
      <a class="layui-btn layui-btn-sm layui-btn-normal" lay-event="export">导出文章</a>
      <!--<a class="layui-btn layui-btn-sm layui-btn-normal" lay-event="move">批量移动</a>-->
    </div>
</script>
<script type="text/html" id="barTool">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="title">
  {{ d.title }}
  {{# if(d.flag.indexOf("1")!==-1){ }}
  <span class="text-danger">[置顶]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("2")!==-1){ }}
  <span class="text-danger">[头条]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("3")!==-1){ }}
  <span class="text-danger">[特荐]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("4")!==-1){ }}
  <span class="text-danger">[推荐]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("6")!==-1){ }}
  <span class="text-danger">[热点]</span>
  {{#  } }}
  {{# if(d.flag.indexOf("6")!==-1){ }}
  <span class="text-danger">[幻灯]</span>
  {{#  } }}
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

<div id="remove" style="display: none;">
	<div class="box-body" style="padding: 20px;">
		<blockquote class="layui-elem-quote">只能将数据移动到相同模型的栏目下，不同模型的数据移动将被忽略</blockquote>
		<div class="layui-form">
		    <div class="layui-form-item">
	            <select name="remove" lay-verify="required">
	                <option></option>
	                <?php echo $string; ?>
	            </select>
		    </div>
		</div>
	</div>
</div>

<div id="Layer1" style="display:none;position:absolute;z-index:1;"></div> 
<style>
    
    #Layer1 img{
    	max-width: 150px;
    }
    .layui-layer-page .layui-layer-content {
	    overflow: inherit;
	}
</style>

    
<script>
var search_field='title';
var keyword='';
var filter_time='updatetime';
var filter_time_range='';
var catid='<?php echo htmlentities($catid); ?>';
	
layui.use(['table', 'laydate'], function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form,
        laydate = layui.laydate;
    laydate.render({
        elem: '#laydate',
        range: true,
    });
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("cms/cms/classlist",["catid"=>$catid]); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
//              { field: 'id', width: 70, title: 'ID' },
                { field: 'title', title: '标题',templet: '#title'},
                { field: 'path', title: '文章封面' ,templet:'#imgTool'},
                { field: 'hits', width: 80, title: '点击量' },
                { field: 'updatetime', width: 180, title: '更新时间' },
//              { field: 'url',width: 60,align:"center", title: 'URL',templet:'<div><a href="{{ d.url }}" target="_blank"><i class="iconfont icon-lianjie"></i></a></div>'},
                { field: 'status', width: 100, align: "center", title: '状态', templet: '#statusTpl', unresize: true },
                { fixed: 'right', width: 150, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: true,
        limits:[10,20,50,100],
    });

    $(".search_btn").on("click", function() {
    	keyword=$(".searchVal").val();
        filter_time_range=$("#laydate").val();
    	
        table.reload("table", {
            page: {
                curr: 1 //重新从第 1 页开始
            },
            where: {
                search_field: 'title',
                keyword: $(".searchVal").val(),
                filter_time: 'updatetime',
                filter_time_range: $("#laydate").val()
            }
        })
    });

        //监听单元格编辑
    table.on('edit(table)', function(obj) {
        var value = obj.value,data = obj.data;
        $.post('<?php echo url("cms/cms/listorder",["catid"=>$catid]); ?>', {'id': data.id,'value':value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                layer.msg(data.msg);
            }

        })
    });

            //监听状态操作
    form.on('switch(status)', function(obj) {
        var _this = $(obj.elem);
        $.post('<?php echo url("cms/cms/setstate",["catid"=>$catid]); ?>', { 'id': this.value,'status':obj.elem.checked}, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                !obj.elem.checked ? _this.prop('checked',true) : _this.removeAttr('checked');
                form.render('checkbox');
                layer.msg(data.msg);
            }

        });
    });


    table.on('toolbar(table)', function(obj) {
            var checkStatus = table.checkStatus(obj.config.id),
                
                ids = [],
                id = tag = '';
        if (obj.event === 'delAll') {
            var data = checkStatus.data;
            if (data.length > 0) {
                for (let i in data) {
                    ids.push(data[i].id);
                }
                layer.confirm('确定删除选中的数据？', { icon: 3, title: '提示信息' }, function(index) {
                    $.post('<?php echo url("cms/cms/delete",["catid"=>$catid]); ?>', { 'ids': ids }, function(data) {
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
        }else if (obj.event === 'move') {
            var data = checkStatus.data;
            if (data.length > 0) {
                for (let i in data) {
                    id += tag + data[i].id;
                    tag = '|';
                    //ids.push(data[i].id);
                }
                layer.open({
                  title: false,
				  type: 1,
				  content: $('#remove'),
				  area: ['300px', '250px'],
                  btn: ['移动'],
                  yes: function(index, layero){
                      var tocatid = $("select[name='remove']").val();
                      if (tocatid == 0) {
                            layer.msg("请选择移动的栏目");
                            return;
                      }
                      $.post('<?php echo url("cms/cms/remove",["catid"=>$catid]); ?>', { 'ids': id,'tocatid':tocatid}, function(data) {
                           if (data.code == 1) {
                              layer.msg(data.msg);
                              layer.close(index);
                           }else{
                            layer.msg(data.msg);
                           }
                      })
                  }

				});
            } else {
                layer.msg("请选择需要移动的数据");
            }

        } else if (obj.event === 'export') {       	
            $.ajax({
	    	  	type:"post",
	    	  	url:'<?php echo url("cms/cms/export"); ?>',
	    	  	async:true,
	    	  	data:{'catid':catid,'search_field':search_field,'keyword':keyword,'filter_time':filter_time,'filter_time_range':filter_time_range},
	    	  	dataType:'json',
	    	  	success:function(data){
	    	  		if (data.code == 1) {
                        table.exportFile(['ID','标题','文章封面','文章详情','点击量','更新时间','添加时间','关键词','摘要','Tags标签'],data.data, 'xls');
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
                $.post('<?php echo url("cms/cms/delete",["catid"=>$catid]); ?>', { 'ids': data.id }, function(data) {
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
            window.open('<?php echo url("cms/cms/edit",["catid"=>$catid]); ?>' + "?id=" + data.id, '_self')
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