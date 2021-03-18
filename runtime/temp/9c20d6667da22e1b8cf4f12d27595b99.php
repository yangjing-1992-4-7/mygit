<?php /*a:2:{s:67:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\main\index.html";i:1615366621;s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\admin\view\index_layout.html";i:1604474802;}*/ ?>
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
    <div class="layui-card-header">控制台</div>
    <div class="layui-card-body">
    	<!--当前时间-->
        <!--<blockquote class="layui-elem-quote layui-bg-green">
            <div id="nowTime"></div>
        </blockquote>-->
        <div class="layui-row layui-col-space10 panel_box">
            <!--<div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                <a href="http://bbs.yzncms.com" target="_blank">
                    <div class="panel_icon layui-bg-black">
                        <i class="icon iconfont icon-interactive layui-anim"></i>
                    </div>
                    <div class="panel_word">
                        <span>论坛</span>
                        <cite>交流社区</cite>
                    </div>
                </a>
            </div>
            <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                <a href="https://www.kancloud.cn/ken678/yzncms/352683" target="_blank">
                    <div class="panel_icon layui-bg-red">
                        <i class="icon iconfont icon-bangzhushouce layui-anim"></i>
                    </div>
                    <div class="panel_word">
                        <span>文档</span>
                        <cite>使用手册</cite>
                    </div>
                </a>
            </div>
            <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                <a href="https://gitee.com/ken678/YZNCMS/tree/tp5.1" target="_blank">
                    <div class="panel_icon layui-bg-green">
                        <i class="icon iconfont icon-oschina layui-anim"></i>
                    </div>
                    <div class="panel_word">
                        <span>码云</span>
                        <cite>模版下载链接</cite>
                    </div>
                </a>
            </div>-->
            <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                <a href="javascript:;">
                    <div class="panel_icon layui-bg-blue">
                        <i class="icon iconfont icon-time layui-anim"></i>
                    </div>
                    <div class="panel_word">
                        <span class="loginTime"><?php if($last_login_time > 0) { echo date('Y-m-d H:i:s',$last_login_time);} else { echo '--';}?></span>
                        <cite>上次登录时间</cite>
                    </div>
                </a>
            </div>
        </div>
        <blockquote class="layui-elem-quote main_btn">
            备注
        </blockquote>
        <div class="layui-row layui-col-space10">
            <div class="layui-col-lg6 layui-col-md12">
                <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
                <table class="layui-table magt0">
                    <colgroup>
                        <col width="150">
                        <col>
                    </colgroup>
                    <tbody>
                        <!--<tr>
                            <td>当前版本</td>
                            <td class="version">yzncms v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?></td>
                        </tr>-->
                        <tr>
                            <td>PHP 版本</td>
                            <td class="phpv"><?php echo htmlentities($sys_info['phpv']); ?></td>
                        </tr>
                        <tr>
                            <td>服务器域名/IP</td>
                            <td class="domains"><?php echo htmlentities($sys_info['domain']); ?> [ <?php echo htmlentities($sys_info['ip']); ?> ]</td>
                        </tr>
                        <tr>
                            <td>服务器环境</td>
                            <td class="server"><?php echo htmlentities($sys_info['web_server']); ?></td>
                        </tr>
                        <tr>
                            <td>数据库版本</td>
                            <td class="dataBase"><?php echo htmlentities($sys_info['mysql_version']); ?></td>
                        </tr>
                        <tr>
                            <td>最大上传限制</td>
                            <td class="maxUpload"><?php echo htmlentities($sys_info['fileupload']); ?></td>
                        </tr>
                        <tr>
                            <td>服务器时间</td>
                            <td class="time"><?php echo htmlentities($sys_info['time']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
<script type="text/javascript">
//获取系统时间
var newDate = '';
getLangDate();
//值小于10时，在前面补0
function dateFilter(date) {
    if (date < 10) { return "0" + date; }
    return date;
}

function getLangDate() {
    var dateObj = new Date(); //表示当前系统时间的Date对象
    var year = dateObj.getFullYear(); //当前系统时间的完整年份值
    var month = dateObj.getMonth() + 1; //当前系统时间的月份值
    var date = dateObj.getDate(); //当前系统时间的月份中的日
    var day = dateObj.getDay(); //当前系统时间中的星期值
    var weeks = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
    var week = weeks[day]; //根据星期值，从数组中获取对应的星期字符串
    var hour = dateObj.getHours(); //当前系统时间的小时值
    var minute = dateObj.getMinutes(); //当前系统时间的分钟值
    var second = dateObj.getSeconds(); //当前系统时间的秒钟值
    var timeValue = "" + ((hour >= 12) ? (hour >= 18) ? "晚上" : "下午" : "上午"); //当前时间属于上午、晚上还是下午
    newDate = dateFilter(year) + "年" + dateFilter(month) + "月" + dateFilter(date) + "日 " + " " + dateFilter(hour) + ":" + dateFilter(minute) + ":" + dateFilter(second);
    if(document.getElementById("nowTime")) { 
	   document.getElementById("nowTime").innerHTML = "亲爱的<?php echo htmlentities($userInfo['username']); ?>，" + timeValue + "好！ 欢迎使用YznCMS v<?php echo htmlentities(app('config')->get('version.yzncms_version')); ?>,当前时间为： " + newDate + "　" + week;
	}
    setTimeout("getLangDate()", 1000);
}

layui.use(['jquery'], function() {
    var $ = layui.jquery;
    //icon动画
    $(".panel a").hover(function() {
        $(this).find(".layui-anim").addClass("layui-anim-scaleSpring");
    }, function() {
        $(this).find(".layui-anim").removeClass("layui-anim-scaleSpring");
    })
    $(".panel a").click(function() {
        parent.addTab($(this));
    })
})
</script>

</body>

</html>