<?php /*a:2:{s:63:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\cms\view\cms\panl.html";i:1615447082;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
</style>

<div class="layui-row layui-col-space10 panel_box">
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="javascript:;">
        <div class="panel_icon layui-bg-black">
            <i class="icon iconfont icon-other layui-anim"></i>
        </div>
        <div class="panel_word">
            <span><?php echo htmlentities($info['category']); ?></span>
            <cite>栏目数量</cite>
        </div>
    </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="javascript:;">
        <div class="panel_icon layui-bg-red">
            <i class="icon iconfont icon-apartment layui-anim"></i>
        </div>
        <div class="panel_word">
            <span><?php echo htmlentities($info['model']); ?></span>
            <cite>模型数量</cite>
        </div>
    </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="javascript:;">
        <div class="panel_icon layui-bg-green">
            <i class="icon iconfont icon-shiyongwendang layui-anim"></i>
        </div>
        <div class="panel_word">
            <span><?php echo htmlentities($info['doc']); ?></span>
            <cite>文档数量</cite>
        </div>
    </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg3">
        <a href="javascript:;">
        <div class="panel_icon layui-bg-blue">
            <i class="icon iconfont icon-label layui-anim"></i>
        </div>
        <div class="panel_word">
            <span><?php echo htmlentities($info['tags']); ?></span>
            <cite>Tags数量</cite>
        </div>
    </a>
    </div>
</div>
<blockquote class="layui-elem-quote">
	导出全部文章信息
	<a class="layui-btn layui-btn-sm layui-btn-normal export"  style="margin-left: 50px;">导出全部文章</a> 	
</blockquote>


    
<script type="text/javascript">
layui.use(['jquery','table'], function() {
    var $ = layui.jquery;
    var table = layui.table;
    //icon动画
    $(".panel a").hover(function() {
        $(this).find(".layui-anim").addClass("layui-anim-scaleSpring");
    }, function() {
        $(this).find(".layui-anim").removeClass("layui-anim-scaleSpring");
    })
    $(".panel a").click(function() {
        parent.addTab($(this));
    })
    
    $(".export").on("click",function(){
    	$.ajax({
    	  	type:"post",
    	  	url:'<?php echo url("cms/cms/export"); ?>',
    	  	async:true,
    	  	dataType:'json',
    	  	success:function(data){
    	  		if (data.code == 1) {
                    table.exportFile(['ID','标题','文章封面','文章详情','点击量','更新时间','添加时间','关键词','摘要','Tags标签'],data.data, 'xls');
                } else {
                    layer.msg(data.msg);
                }
    	  		
    	  	}
	    });
    })
})
</script>

</body>

</html>