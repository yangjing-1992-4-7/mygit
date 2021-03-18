<?php /*a:3:{s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\index\index.html";i:1615865084;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\head.html";i:1615865700;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\foot.html";i:1615866737;}*/ ?>
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
						<div class="indexV2-container">
							<div class="index-banner">
								<div class="swiper-container">
								  <div class="swiper-wrapper">
								    <div class="swiper-slide"><img src="/yzn/public/img/banner1.jpg"></div>
								    <div class="swiper-slide"><img src="/yzn/public/img/banner2.jpg"></div>
								    <div class="swiper-slide"><img src="/yzn/public/img/banner1.jpg"></div>
								  </div>
								  
								  <div class="swiper-pagination"></div>
								</div>
								
							
								<div class="banner-float-info-mask"></div>
								<div class="banner-float-info-outer">
									<div class="banner-float-info-inner">
										<a href="javascript:void(0)">
											<div class="intro-data">
												<div class="intro-data-item" >
													<div class="item-img img-info1"></div>
													<span class="item-title">平台安全运营</span>
													<span class="item-text">13年268天11时</span>
												</div>
												<div class="intro-data-item">
													<div class="item-img img-info2"></div>
													<span class="item-title">累计注册用户</span>
													<span class="item-text">1.19亿</span>
												</div>
												<div class="intro-data-item" >
													<div class="item-img img-info3"></div>
													<span class="item-title">累计放款金额</span>
													<span class="item-text">1,939.15亿</span>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="index-notice">
								<div class="index-notice-inner"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAOCAYAAAG+6sciAAAAAXNSR0IArs4c6QAAAchJREFUKBWFUksoRGEU/v57xyNCHlOWRpRHdkpW5oaJwo6NFWVmVh5b1jYWbOcnKbFhoSwkYexsrNgoka0ojVeMufd3zuW+MnLqn/8/5/vOd8+ccwA2Q87zpSGaUlBqlh2fcZRMICrvAVVjQydJ4aPQk1mG7OCghwxv6bh/PKPUbw3oei2OJu60YK6T0r3SS8A5LPPc0xiUJXhRz1BUIKeb1i2KC5uxP3br6fr1mKRUjM4UlXsdQriqDJlMGFnzmHh1LldZA0gn29n3PsdeXBbgSl0Q2IS+tTp85Fo8giEXSXqGeQjpnTDNVSK25q/F16aQnZHvx5Bntlg+zI6lE3aRGoqLItSDWIDYnepEj6zgmFcke1F5Q/8/Aq7BSN2hQHQFCUxyjEensEIJbXboZ1DfI1W7dowEcJC4FBhaLUNWq4aVEzDRQPNKUXK9o+XeLAKzHhamoYs4DhMZBwvh6fPJcf69j5KnxOETsL9bGqD5nOjyKIQ16YvQfkA8uHvtQ/58nsQ3CePj2u/G9m+U4/11iVZl3GXxg3siEEGOllGIGxQVDvAqM/RbhKOOxdZL8fm2ACX6Ea5sxPaIaUO8oO/ZHQhtDumJvS9KiJRUFmUsEwAAAABJRU5ErkJggg==" class="notice-img">
									<a href="javascript:void(0)" class="noti">
										<p class="notice-title">【公告】2021年春节假期工作安排通知</p>
										<p class="notice-time">2021-02-08</p>
									</a>
									<a href="javascript:void(0)"  class="noti more">
										更多
										<div class="more-icon"></div>
									</a>
								</div>
							</div>
							<div class="index-loan">
								<div class="index-loan-bg"></div>
								<div class="index-loan-inner">
									<div class="loan-feature-item">
										<div class="float-feature-img feature-img1"></div>
										<div class="feature-info" style="left:615px;top:130px;width:448px;">
											<div class="info-title">额度高</div>
											<div class="info-content">
												简单几步完成认证，轻松获取借款额度
												<br>多种认证项目，随时自由选择，最高可提额至20万元
											</div>
										</div>
									</div>
									<div class="loan-feature-item">
										<div class="float-feature-img feature-img2" style="float:right;"></div>
										<div class="feature-info" style="left:140px;top:130px;width:446px;">
											<div class="info-title">利息低</div>
											<div class="info-content">
												息费透明，坚守合规
												<br>本平台综合年化利率以最终审批结果为准
											</div>
										</div>
									</div>
									<div class="loan-feature-item" style="cursor:pointer;">
										<div class="float-feature-img feature-img3"></div>
										<!--<div class="feature-qrcode">
											<div class="qrcode-wrapper">
												<div class="qrcocde-inner">
													<div class="code-item" style="margin-right:35px;">
														<div class="code-img code-img1" style="background-size:122px 122px;"></div>
														<div class="code-title">下载借款APP</div>
													</div>
													<div class="code-item">
														<div class="code-img code-img2"></div>
														<div class="code-title">关注官方公众号</div>
													</div>
												</div>
											</div>
										</div>-->
										<div class="feature-info" style="left:615px;top:130px;width:447px;">
											<div class="info-title">到账快</div>
											<div class="info-content">
												纯线上申请，极速审批，到账时间5分钟起，
												<br>出借资金来源于持牌金融机构
											</div>
										</div>
									</div>
								</div>
							</div>
							
				<ul class="financing-block-list financing-block"  style="margin-bottom: 40px;">
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> 
									<a  href="<?php echo url('index/detail'); ?>" target="_blank"> 建材供应贷-GYD201807190029</a> 
								</h1>
								<div class="fl"> 
									<span title="核心企业担保" class="dan circle-desc"></span> 
									<span title="借款公司为核心企业的上游供应企业" class="circle-desc newGong"></span> 
									<span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span> 
								</div>
							</div>
							<div class="desc">
								<div class="data-item new-data-item">
									<p class="new-datap1"> 13<span class="padd">.00%</span>+1<span class="padd">.00%</span> </p>
									<p class="new-datap2 bottom-title">预期年化收益</p>
								</div>
								<div class="data-item pos-adj new-pos-adj">
									<p class="sub-title">90天</p>
									<p class="bottom-title">出借期限</p>
								</div>
								<div class="data-item pos-adj">
									<p class="sub-title">60000.00</p>
									<p class="bottom-title">借款金额</p>
								</div>
								<div class="data-item new-data-item2">
									<div class="progress-layout" data-value="100">
										<div class="progress">
											<div class="progress-color"></div>
										</div> <span class="item-span-last">筹款进度:<span class="percentage">0%</span></span>
									</div>
								</div>
							</div>
						</div>
						<!--进度条百分比-->
						<div class="right new-bg">
							<a href="<?php echo url('index/detail'); ?>" target="_blank"  class="btn btn-buying btn-abs borrow_75879">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>" target="_blank">建材供应贷-GYD201807190028</a></h1>
								<div class="fl"> <span title="核心企业担保" class="dan circle-desc"></span> <span title="借款公司为核心企业的上游供应企业" class="circle-desc newGong"></span> <span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span> </div>
							</div>
							<div class="desc">
								<div class="data-item new-data-item">
									<p class="new-datap1"> 13<span class="padd">.00%</span>+1<span class="padd">.00%</span> </p>
									<p class="new-datap2 bottom-title">预期年化收益</p>
								</div>
								<div class="data-item pos-adj new-pos-adj">
									<p class="sub-title">90天</p>
									<p class="bottom-title">出借期限</p>
								</div>
								<div class="data-item pos-adj">
									<p class="sub-title">60000.00</p>
									<p class="bottom-title">借款金额</p>
								</div>
								<div class="data-item new-data-item2">
									<div class="progress-layout" data-value="100">
										<div class="progress">
											<div class="progress-color"></div>
										</div> <span class="item-span-last">筹款进度:<span class="percentage">0%</span></span>
									</div>
								</div>
							</div>
						</div>
						<!--进度条百分比-->
						<div class="right new-bg">
							<a href="<?php echo url('index/detail'); ?>" target="_blank"  class="btn btn-buying btn-abs borrow_75878">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>" target="_blank">建材供应贷-GYD201807130164 </a></h1>
								<div class="fl"> <span title="核心企业担保" class="dan circle-desc"></span> <span title="借款公司为核心企业的上游供应企业" class="circle-desc newGong"></span> <span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span> </div>
							</div>
							<div class="desc">
								<div class="data-item new-data-item">
									<p class="new-datap1"> 13<span class="padd">.00%</span>+1<span class="padd">.00%</span> </p>
									<p class="new-datap2 bottom-title">预期年化收益</p>
								</div>
								<div class="data-item pos-adj new-pos-adj">
									<p class="sub-title">90天</p>
									<p class="bottom-title">出借期限</p>
								</div>
								<div class="data-item pos-adj">
									<p class="sub-title">100000.00</p>
									<p class="bottom-title">借款金额</p>
								</div>
								<div class="data-item new-data-item2">
									<div class="progress-layout" data-value="100">
										<div class="progress">
											<div class="progress-color"></div>
										</div> <span class="item-span-last">筹款进度:<span class="percentage">0%</span></span>
									</div>
								</div>
							</div>
						</div>
						<!--进度条百分比-->
						<div class="right new-bg">
							<a href="<?php echo url('index/detail'); ?>" target="_blank"  class="btn btn-buying btn-abs borrow_74836">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>" target="_blank">建材供应贷-GYD201807130024</a></h1>
								<div class="fl"> <span title="核心企业担保" class="dan circle-desc"></span> <span title="借款公司为核心企业的上游供应企业" class="circle-desc newGong"></span> <span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span> </div>
							</div>
							<div class="desc">
								<div class="data-item new-data-item">
									<p class="new-datap1"> 13<span class="padd">.00%</span>+1<span class="padd">.00%</span> </p>
									<p class="new-datap2 bottom-title">预期年化收益</p>
								</div>
								<div class="data-item pos-adj new-pos-adj">
									<p class="sub-title">90天</p>
									<p class="bottom-title">出借期限</p>
								</div>
								<div class="data-item pos-adj">
									<p class="sub-title">100000.00</p>
									<p class="bottom-title">借款金额</p>
								</div>
								<div class="data-item new-data-item2">
									<div class="progress-layout" data-value="100">
										<div class="progress">
											<div class="progress-color"></div>
										</div> <span class="item-span-last">筹款进度:<span class="percentage">0%</span></span>
									</div>
								</div>
							</div>
						</div>
						<!--进度条百分比-->
						<div class="right new-bg">
							<a href="<?php echo url('index/detail'); ?>" target="_blank"  class="btn btn-buying btn-abs borrow_74687">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>" target="_blank">建材供应贷-GYD201807190029</a></h1>
								<div class="fl"> <span title="核心企业担保" class="dan circle-desc"></span> <span title="借款公司为核心企业的上游供应企业" class="circle-desc newGong"></span> <span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span> </div>
							</div>
							<div class="desc">
								<div class="data-item new-data-item">
									<p class="new-datap1"> 13<span class="padd">.00%</span>+1<span class="padd">.00%</span> </p>
									<p class="new-datap2 bottom-title">预期年化收益</p>
								</div>
								<div class="data-item pos-adj new-pos-adj">
									<p class="sub-title">90天</p>
									<p class="bottom-title">出借期限</p>
								</div>
								<div class="data-item pos-adj">
									<p class="sub-title">60000.00</p>
									<p class="bottom-title">借款金额</p>
								</div>
								<div class="data-item new-data-item2">
									<div class="progress-layout" data-value="100">
										<div class="progress">
											<div class="progress-color"></div>
										</div> <span class="item-span-last">筹款进度:<span class="percentage">0%</span></span>
									</div>
								</div>
							</div>
						</div>
						<!--进度条百分比-->
						<div class="right new-bg">
							<a href="<?php echo url('index/detail'); ?>" target="_blank" class="btn btn-buying btn-abs borrow_75879">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
				</ul>	
							
							<div class="index-honor">
								<div class="honor-inner">
									<div class="honor-title">荣誉资质</div>
									<div class="honor-list">
										<div class="honor-item">
											<div class="item-icon">
												<img src="/yzn/public/img/icon_honor1.png">
											</div>
											<div class="item-name">上海金融创新奖</div>
										</div>
										<div class="honor-item">
											<div class="item-icon">
												<img src="/yzn/public/img/icon_honor2.png">
											</div>
											<div class="item-name">中国互联网百强企业</div>
										</div>
										<div class="honor-item">
											<div class="item-icon">
												<img src="/yzn/public/img/icon_honor3.png"></div>
												<div class="item-name">经济突出贡献奖</div>
										</div>
										<div class="honor-item">
											<div class="item-icon">
												<img src="/yzn/public/img/icon_honor4.png">
											</div>
											<div class="item-name">高新技术企业</div>
										</div>
										<div class="honor-item">
											<div class="item-icon">
												<img src="/yzn/public/img/icon_honor5.png">
											</div>
											<div class="item-name">浦东研发机构</div>
										</div>
										<div class="honor-item">
											<div class="item-icon">
												<img src="/yzn/public/img/icon_honor6.png">
											</div>
											<div class="item-name">浦东新区智慧城市创新示范企业</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="index-aboutus">
								<div class="aboutus-bg"></div>
								<div class="aboutus-inner">
									<div class="aboutus-title">关于我们</div>
									<div class="aboutus-list clearfix">
										<a href="javascript:void(0)" >
											<div class="aboutus-item" style="margin-right:16px;">
												<div class="item-icon item-icon1"></div>
												<div class="item-right">
													<div class="item-right-title">纽交所上市公司</div>
													<div class="item-right-sub">上市代码：FINV</div>
												</div>
											</div>
										</a>
										<a href="javascript:void(0)" >
											<div class="aboutus-item" style="margin-right:16px;">
												<div class="item-icon item-icon3"></div>
												<div class="item-right">
													<div class="item-right-title">安全保障</div>
													<div class="item-right-sub">多重风控品质保障</div>
												</div>
											</div>
										</a>
										<a href="javascript:void(0)" >
											<div class="aboutus-item">
												<div class="item-icon item-icon4"></div>
												<div class="item-right">
													<div class="item-right-title">业绩报告</div>
													<div class="item-right-sub">诚信公开透明</div>
												</div>
											</div>
										</a>
									</div>
								</div>
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