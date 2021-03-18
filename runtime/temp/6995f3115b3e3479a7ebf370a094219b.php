<?php /*a:3:{s:71:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\index\question.html";i:1615772891;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\head.html";i:1615865700;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\foot.html";i:1615866737;}*/ ?>
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
				<div  class="main-container clear-float">
					<!---->
					<!---->
					<div   class="wrapper-title">
						常见问题
						
					</div>
					<div   class="borrowerqa">
						<div   class="qa1 question">
							<p  >借款可借多少钱？</p>
							<ul  >
								<li  >首次借款金额为500-30000元间。</li>
								<li  >按时还款累计信用后，您的额度会有较大幅度提升。个人最高可达20万元。</li>
							</ul>
						</div>
						<div   class="qa2 question">
							<p  >借款需要什么材料？</p>
							<ul  >
								<li  >需要您提供个人基本信息 、身份证等图片资料。</li>
								<li  >具体所需材料在后续界面有详细说明，您可在对应界面进行在线上传提交。</li>
							</ul>
						</div>
						<div   class="qa3 question">
							<p  >借款审核需要多长时间？</p>
							<ul  >
								<li  >提交申请后，借款最快可当天到账。</li>
								<li  >上传更多的资料有助于提高您的借款额度、缩短放款时间。</li>
							</ul>
						</div>
					</div>
					<div   class="wrapper-title">
						轻松借款
					</div>
					<div   class="superior"><span   class="option-title pos1">平台大</span><span   class="option-title pos2">额度大</span><span   class="option-title pos3">费用少</span><span   class="option-title pos4">到账快</span><span   class="option-info pos5">银行合作，1亿人的选择</span><span   class="option-info pos6">个人最高可借20万</span><span   class="option-info pos7">综合年化利率9%起，以审批为准</span><span   class="option-info pos8">到账时间5分钟起，以实际为准</span></div>
					<a   href="javascript:void(0);" class="gotobroorowbtn">立刻申请借款</a>
					<div   class="txttips">
						<p   class="txt">本平台承诺不额外向用户收取费用；不向学生提供借款服务</p>
						<p   class="txt">市场有风险，选择需谨慎；请根据个人能力合理贷款，理性消费</p>
						<p   class="txt">
							综合年化利率：除本金以外所有还款/期初借款本金；到账时间：提交借款申请到资金到账时间
						</p>
						<p   class="txt">
							金融服务将根据您的个人情况由合适的正规金融机构提供
						</p>
					</div>
				</div>
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