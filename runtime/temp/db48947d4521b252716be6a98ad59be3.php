<?php /*a:3:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\index\detail.html";i:1615883516;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\head.html";i:1615865700;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\foot.html";i:1615866737;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8">
		<meta  name="viewport" content="width=device-width, initial-scale=1">
		<meta  data-hid="meta-key-words" name="keywords" content="<?php echo config('site_keyword'); ?>">
		<meta  name="description" content="<?php echo config('site_description'); ?>">
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-control" content="no-cache">
		<meta http-equiv="Cache" content="no-cache">
		<title><?php echo config('site_title'); ?></title>
        <link rel="stylesheet" type="text/css" href="/yzn/public/css/in.css"/>
        <script src="/yzn/public/js/jquery-1.8.2.min.js"></script>
        <link rel="stylesheet" href="/yzn/public/js/swiper-6.1.2/package/swiper-bundle.css">
		<script src="/yzn/public/js/swiper-6.1.2/package/swiper-bundle.min.js"></script>
		<script src="/yzn/public/js/sweetalert/js/sweetalert.min.js"></script>
		<script src="/yzn/public/js/in.js"></script>
	</head>
	<body >
		<div  id="__nuxt">
			<div class="nuxt-progress" style="width:0%;height:2px;background-color:#39a1ea;opacity:0;"></div>
			<div id="__layout">
				<div>
					<div>
						<div class="index-header">
							
							<div class="sec-head">
								<div class="nav-logo">
									<a href="/yzn/" aria-current="page" class="logo nuxt-link-exact-active link-active"> </a>
								</div>
								<ul class="nav-menu">
									<li class="has-submenu">
										<a href="/yzn/" target="_self"   >首页</a>
									</li>	
									<li class="has-submenu <?php if(app('request')->action()=='borrow'||app('request')->action()=='detail'): ?>active<?php endif; ?>">
										<a href="<?php echo url('index/borrow'); ?>" target="_self">我要借款</a>
										
									</li>
									<li class="has-submenu <?php if(app('request')->action()=='repay'): ?>active<?php endif; ?>">
										<a href="<?php echo url('index/repay'); ?>" target="_self">我要出借</a>
									</li>
									<li class="has-submenu <?php if(app('request')->action()=='question'): ?>active<?php endif; ?>">
										<a href="<?php echo url('index/question'); ?>" target="_self">常见问题</a>
									</li>
									<li class="has-submenu <?php if(app('request')->action()=='about'): ?>active<?php endif; ?>">
										<a href="<?php echo url('index/about'); ?>" target="_self">关于我们</a>
									</li>
								</ul>
								<div class="login-wrap">
									<div class="login-btn-outer">
										<div class="login-btn">
											<a href="<?php echo url('index/login'); ?>" style="color: #ffffff">登录 </a>/ 
											<a href="<?php echo url('index/reg'); ?>" style="color: #ffffff">注册 </a>
										</div>
									</div>
								</div>
								<span>
									<div role="tooltip" id="el-popover-8681" aria-hidden="true" class="el-popover el-popper" style="width:undefinedpx;display:none;">
										<div slot="" class="logined-spread">
											<a href="<?php echo url('index/loginout'); ?>">退出登录</a>
										</div>
									</div>
								</span>
							</div>
							<div class="sub-menu-bg" style="display:none;"></div>
						</div>
		<div class="container detail">
			<div class="layout">
				
				<div class="detail-space layout border">
					<!--标题-->
					<div class="top">
						<div class="left-title">
							<p>建材供应贷-GYD201807190029</p>
							<div class="icons"> 
								<span title="核心企业担保" class="dan circle-desc"></span> 
								<span title="借款公司为核心企业的上游供应企业" class="circle-desc newGong"></span> 
								<span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span>
								<!--<span class="circle-desc bao">保</span>-->
							</div>
						</div>
						<div class="right-license">
							<a href="<?php echo url('index/loan'); ?>" target="_blank">《借款三方服务协议范本》</a>
						</div>
					</div>
					
					<div class="left">
					
						<div class="data-desc">
							<div class="data-item first">
								<p class="sub-title">13<span class="dec">.00%<span style="font-size: 35px;">+1</span><span>.00%</span></span>
								</p>
								<p class="bottom-title">预期年化收益</p>
							</div>
							
							<div class="data-item small second">
								<p class="sub-title">60,000<span>元</span></p>
								<p class="bottom-title">总借款金额</p>
							</div>
							<div class="data-item small third">
								<!--<p class="sub-title" style="text-align: center"></p>-->
								<p class="sub-title">90<span>天</span></p>
								<p class="bottom-title">出借期限</p>
							</div>
						</div>
						<!--数据详情结束-->
						<!--百分比-->
						<div class="progress-layout detail" data-value="100"> <span class="fl" style="margin-top: 34px">筹款进度：</span>
							<div class="progress">
								<div class="progress-color"></div>
							</div>
							<div class="progress-desc">
								<p> <span class="percentage">100%</span> <span class="surplus">可投0元</span> </p>
							</div>
						</div>
						<!--百分比结束，这是日标显示-->
						<p class="newText">融资项目募集期：<span class="color-orange">五个工作日</span><i class="icon hoverIcon"></i></p>
						
						<div class="three-items clearfix"> <span><i class="icon three-icon1"></i>信息披露透明</span> <span><i class="icon three-icon2"></i>合规运营三年</span> <span><i class="icon three-icon3"></i>江西银行存管</span>
							<div class="clear-both"></div>
						</div>
						<p class="color-orange notesText"> <span class="value">注:本标为按天计息标，借款人可能提前还款。如果出现提前还款，您所获利息将按借款人实际借款天数计算！</span> </p>
						<div class="bd-desc fl">
							<p><span class="name">相关费用：</span><span class="value">充值/出借免费</span></p>
							<p><span class="name">发布日期：</span><span class="value">2018-07-21</span></p>
							<p><span class="name">还款方式：</span><span class="value" style="color: #fe8b2e;">一次性还本付息</span> <span class="value" style="margin-left: 15px">满标放款后开始计息</span></p>
						</div>
						<!--这是月标显示-->
					</div>
					
					<div class="right">
						<p class="balance">账户余额：
							<a href="<?php echo url('index/login'); ?>">登录查看</a>
						</p>
						<div class="actions">
							<a class="action-recharge color-orange" href="<?php echo url('index/login'); ?>">立即充值</a>
							<a class="action-all" href="<?php echo url('index/login'); ?>">出借全部</a>
						</div>
						<form id='bid_form' action="">
							<div class="input-default right-input"> <input type="text" class="input-default" disabled="disabled" placeholder="100元起投"> <span>元</span> </div>
							<p class="gains">预计收益：<span class="number">0.00</span>元</p>
							<a class="btn btn-default btn-submit" href="<?php echo url('index/login'); ?>">请登录</a>
							<p style="text-align: center;color: #020202;position: relative;top: 7px;">资金存管于江西银行安全有保障</p>
						</form>
					</div>
					
				</div>
			
				<div class="action-tab">
					<a class="tab active" href="javascript:void(0)">借款详情</a>
					<a class="tab" href="javascript:void(0)">图片说明</a>
					<!--<a class="tab" href="javascript:void(0)">还款计划</a>-->
					<a class="tab last" href="javascript:void(0)">出借记录</a>
				</div>
				
				<div>
				<div class="person-info layout">
					<!--信息详情-->
					<div class="info-list-layout" style="padding-top: 30px">
						<!--借款企业信息-->
						<div class="titles">
							<div class="info-sub-title">
								<p>借款企业信息</p>
							</div>
						</div>
						<ul class="value-list">
							<li class="col3"> <span class="name">公司全称</span> <span class="value">乌苏市洋泰科技有限公司</span> </li>
							<li class="col3"> <span class="name">注册资金</span> <span class="value">4600.0000 万元</span> </li>
							<li class="col3"> <span class="name">法定代表</span> <span class="value">丁永忠</span> </li>
							<li class="col3"> <span class="name">营业执照</span> <span class="value">91654202560516427W</span> </li>
							<li class="col3"> <span class="name">注册地址</span> <span class="value">新疆维吾尔自治区 塔城地区</span> </li>
							<li class="col3"> <span class="name">征信报告</span> <span class="value">良好</span> </li>
							<li class="col3"> <span class="name">逾期次数</span> <span class="value">9次</span> </li>
							<li class="col3"> <span class="name">逾期金额</span> <span class="value">600,000.00元</span> </li>
						</ul>
						<!--借贷人信息结束-->
						<!--核心建筑担保公司-->
						<div class="titles">
							<div class="info-sub-title">
								<p>核心企业信息</p>
							</div>
						</div>
						<ul class="value-list">
							<li class="col3"> <span class="name">机构名称</span> <span class="value">新疆三星建工集团有限公司</span> </li>					
							<li class="col3"> <span class="name">注册时间</span> <span class="value">2002</span> </li>
							<li class="col3"> <span class="name">营业执照</span> <span class="value">91654003738363182L</span> </li>
							<li class="col3"> <span class="name">注册资金</span> <span class="value">5000.00万元</span> </li>
							<li class="col3"> <span class="name">企业征信</span> <span class="value">良好</span> </li>
						</ul>
					
						<div class="titles">
							<div class="info-sub-title">
								<p>借款说明</p>
							</div>
						</div>
						<ul class="value-list value-color">
							<li class="liTxetCon"> 
								1.借款企业具备相关的营业许可，有固定业务渠道，稳定的合作单位，资金流健康，应收账款较多，具备一定的还款能力；
								2.借款企业是核心企业的上游材料/劳务供应公司，与核心企业签署了供销采购/劳务合同；
								3.借款企业在核心企业具有一定的应收账款，借款资金仅用于借款企业的短期经营周转；
								4.核心企业作为供应链的核心，财务健康，年施工额在两千万以上，具有较强的担保能力；
								5.为了更进一步把控风险，保障资金安全，本次借款追加核心企业的无限连带责任担保。
								
							</li>
						</ul>
					</div>
					<!--还款信息结束-->
					<!--安全保障-->
					<div class="info-list-layout">
						<!--风控说明-->
						<div class="titles">
							<div class="info-sub-title">
								<p>风控说明</p>
							</div>
						</div>
						<ul class="info-list">
							<li class="long-word">
								<p>1、本借款企业的<span class="color-orange">营业执照、注册资金、注册地址、开户许可证、征信报告、供销合同、联系方式、担保函</span>等相关资料都经过小猪理财风控部门审核，借款企业符合小猪理财的借款审核标准。</p>
							</li>
							<li class="long-word">
								<p>2、核心企业作为还款保障的核心，经风控人员实地尽职调查，公司<span class="color-orange">经营正常，资质齐全，资金流健康，应收账款较多</span>，具备一定的担保能力，符合担保条件，此次借款由核心企业进行全额本息担保。</p>
							</li>
							<li class="long-word last">
								<p>3、保障还款来源：<span class="color-orange">第一还款来源：</span>借款企业应收账款；<span class="color-orange">第二还款来源：</span>借款企业经营收入；<span class="color-orange">第三还款来源：</span>核心企业代偿。
								</p>
							</li>
						</ul>
						<!--其他相关信息-->
						<div class="titles">
							<div class="info-sub-title">
								<p>其他相关信息</p>
							</div>
						</div>
						<ul class="value-list newOrder">
							<li class="col3"> <span class="name">借款人经营及财务状况</span> <span class="value">良好</span> </li>
							<li class="col3"> <span class="name">借款人还款能力变化</span> <span class="value">正常履约中</span> </li>
							<li class="col3"> <span class="name">借款人涉诉及受行政处罚情况</span> <span class="value">暂无</span> </li>
							<li class="col3"> <span class="name">借款人资金运用情况</span> <span class="value" style="margin-left: 15px;">江西银行已受理提现  </span></li>
						</ul>
						
						<div class="titles">
							<div class="info-sub-title">
								<p>风险提示</p>
							</div>
						</div>
						<ul class="info-list">
							
							<li class="long-word" style="margin: 0">
								<p style="padding-right: 14px;">
									小猪理财及其合作机构将始终践行以风险控制为核心，最大程度的尽力确保借款人信息的真实性，
									小猪理财仅为信息发布平台，出借人应根据自身的出借偏好和风险承受能力进行独立判断和作出决策，
									并自行承担资金出借的风险与责任，市场有风险 出借需谨慎。
								</p>
							</li>
						</ul>
						<div class="control"> <img src="/yzn/public/img/eg5.png" alt="风控示意图" style="margin-top: 20px;"> </div>
						<!--风控示意图结束-->
					</div>
					<!--多重担保无懈可击结束-->
				</div>
			
				<!--借款详情结束-->
				<!--图片材料详情-->
				<div class="person-info">
					<!--图片材料列表-->
					<ul class="images">
						<li><img  class="gallery-img" src="/yzn/public/img/up1.jpg" alt="借款企业营业执照.jpg">
							<p>借款企业营业执照.jpg</p>
						</li>
						<li><img  class="gallery-img" src="/yzn/public/img/up2.jpg" alt="借款企业开户许可证.jpg">
							<p>借款企业开户许可证.jpg</p>
						</li>
						<li><img  class="gallery-img" src="/yzn/public/img/up3.jpg" alt="借款企业供销合同.jpg">
							<p>借款企业供销合同.jpg</p>
						</li>
						<li><img  class="gallery-img" src="/yzn/public/img/up4.jpg" alt="核心建筑企业担保函.jpg">
							<p>核心建筑企业担保函.jpg</p>
						</li>
						<li><img  class="gallery-img" src="/yzn/public/img/up5.jpg" alt="核心建筑企业营业执照.jpg">
							<p>核心建筑企业营业执照.jpg</p>
						</li>
						<li><img  class="gallery-img" src="/yzn/public/img/up6.jpg" alt="核心建筑企业担保协议.jpg">
							<p>核心建筑企业担保协议.jpg</p>
						</li>
					</ul>
					<!--图片材料列表结束-->
				</div>
				<!--图片材料详情结束-->
				<!--出借记录详情-->
				<div class="person-info">
					<div class="current-status">
						<p> 已出借人数<span class="color-orange">5</span>人
						</p>
						<p> 已出借金额<span class="color-orange">60,000.00元</span> </p>
						<p> 满标用时<span class="color-orange">2 天1 时19 秒</span> </p>
					</div>
					<!--还款记录-->
					<div class="desc-table" style="height: 500px">
						<nav class="desc-table-nav">
							<ul>
								<li>序号</li>
								<li>出借人</li>
								<li>出借金额</li>
								<li>出借时间</li>
								<li>出借方式</li>
								<li>状态</li>
							</ul>
						</nav>
						<ul class="history-list" id='output'>
							
							<li>
								<p><span><span class="fl" style="margin-left: 20px">1</span><i class="first"></i></span><span>xz**ev</span><span class="color-orange">10000.00</span><span>2018-07-21 12:40:03</span><span>IOS</span><span>已放款</span></p>
							</li>
							
							<li>
								<p><span><span class="fl" style="margin-left: 20px">2</span></span><span>xz**td</span><span class="color-orange">2000.00</span><span>2018-07-21 13:06:30</span><span>Android</span><span>已放款</span></p>
							</li>
							
							<li>
								<p><span><span class="fl" style="margin-left: 20px">3</span><i class="rich"></i></span><span>xz**bQ</span><span class="color-orange">20000.00</span><span>2018-07-22 10:32:11</span><span>IOS</span><span>已放款</span></p>
							</li>
							
							<li>
								<p><span><span class="fl" style="margin-left: 20px">4</span></span><span>xz**kd</span><span class="color-orange">20000.00</span><span>2018-07-22 13:38:42</span><span>Android</span><span>已放款</span></p>
							</li>
							
							<li>
								<p><span><span class="fl" style="margin-left: 20px">5</span><i class="end"></i></span><span>xz**65</span><span class="color-orange">8000.00</span><span>2018-07-23 10:25:04</span><span>Android</span><span>已放款</span></p>
							</li>
						</ul>
					</div>
					<!--还款记录结束-->
					<!--分页列表-->
					<div class="pages">
						<div class="page-layout">
							<div class="page-list" id='pagination'> </div>
						</div>
					</div>
					<!--分页列表结束-->
				</div>
			</div>		
				<!--出借记录详情结束-->
			</div>
		</div>
<div id="Layer1" style="display:none;position:absolute;z-index:1;"></div> 
<style>
    #Layer1 img{
    	width: 600px;
    }
</style>		
<div class="index-footer">
							<div class="index-footer-inner">
								<div class="footer-l1 clearfix">
									<div class="footer-l1-inner clearfix">
										<div class="footer-sitemap">
											<div class="footer-sitemap-split">
												<p class="sitemap-title">关于我们</p>
												<?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
													<a href="<?php echo url('index/about',array('id'=>$val['id'])); ?>" target="_blank">
														<p class="sitemap-item"><?php echo htmlentities($val['catname']); ?></p>
													</a>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
											<div class="footer-sitemap-split">
												<p class="sitemap-title">安全保障</p>
												<a href="javascript:void(0)" >
													<p class="sitemap-item">法律法规</p>
												</a>
												<a href="javascript:void(0)" >
													<p class="sitemap-item">安全保障</p>
												</a>
												<a href="javascript:void(0)" >
													<p class="sitemap-item">反舞弊专线</p>
												</a>
												<a href="/yzn/public/img/privacy_policy.pdf" target="_blank">
													<p class="sitemap-item">用户隐私政策</p>
												</a>
												<a href="<?php echo url('index/pc_term'); ?>" target="_blank">
													<p class="sitemap-item">用户服务协议</p>
												</a>
											</div>
										</div>
										<div class="footer-qrcode">
											<div class="footer-qrcode-title">关注我们</div>
											<div class="footer-qrcode-split" style="margin-right:28px;"><img src="/yzn/public/img/qrcode3.png">
												<p><?php echo config('site_title'); ?></p>
											</div>
											<div class="footer-qrcode-split"><img src="/yzn/public/img/qrcode4.png">
												<p><?php echo config('site_title'); ?></p>
											</div>
										</div>
										<div class="footer-contact">
											<p class="contact-title">联系我们</p>
											<p class="service-call"><?php echo config('telphone_number'); ?></p>
											<p class="service-time">服务时间: 08:00-24:00</p>
											<p class="complain-wrap">
												投诉热线
												<span class="complain-line"><?php echo config('telphone_number'); ?>（8:00-24:00）</span></p>
											<p class="contact-contents">
												<a href="javascript:void(0)" >
													<span class="contact-contents-item">
														<i class="contact-item-img service-icon"></i>
														在线客服
              										</span>
												</a>
												<a href="javascript:void(0)" >
													<span class="contact-contents-item">
														<i class="contact-item-img weibo-icon"></i>
														新浪微博
              										</span>
												</a>
											</p>
										</div>
									</div>
									<div class="footer-l2-pre">
										金融服务将根据您的个人情况由适合的正规金融机构提供；综合年化利率（除本金以外所有还款/期初借款本金）以最终审批结果为准；
										<br>平台承诺不额外向用户收取费用；借款实际到账时间（提交借款申请到资金到账时间）视机构放款速度而定；请根据个人能力合理贷款，理性消费，避免逾期
									</div>
								</div>
								<div class="footer-l2 clearfix">
									<div class="footer-l2-inner clearfix">
										<div>
											<div class="footer-l2-imgs">
												<a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31011502000216" target="_blank">
													<i class="footer-l2-icon icon-1"></i>
												</a>
												<a href="http://www.shjbzx.cn/" target="_blank">
													<i class="footer-l2-icon icon-4"></i>
												</a>
											</div>
											<p class="footer-l2-rights">
												Copyright Reserved 2007-2021©<?php echo config('site_title'); ?> |
												<a href="https://beian.miit.gov.cn/" target="_blank"><?php echo config('web_site_icp'); ?></a>
												 | 网站支持IPv6
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="right-side-box" >
							<div class="box-item-div call-phone-div" >
								<div class="item-icon call-phone" ></div>
								<div class="item-popup call-phone-popup" ></div>
							</div>
							<div class="box-item-div qr-code-div" >
								<div class="item-icon qr-code"></div>
								<div class="item-popup app-down" ></div>
							</div>
							<div class="box-item-div call-service-div" >
								<a href="javascirpt:void(0)"  class="">
									<div class="item-icon call-service" ></div>
								</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		
	</body>

</html>
<script>
	$(document).delegate(".gallery-img","mousemove",function(event){
	    x = event.pageX +20; 
		y = event.pageY +20; 
		document.getElementById("Layer1").style.left = x+"px"; 
		document.getElementById("Layer1").style.top = y+"px"; 
		document.getElementById("Layer1").innerHTML = "<img src='" + $(this).attr("src") +"'/>"; 
		document.getElementById("Layer1").style.display = "block";
	})
	
	$(document).delegate(".gallery-img","mouseout",function(){
		$("#Layer1").hide();
	})
</script>