<?php /*a:3:{s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\index\repay.html";i:1615864473;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\head.html";i:1615865700;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\foot.html";i:1615866737;}*/ ?>
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
		<div class="container repay">
			<div class="loan-banner"></div>
			<div class="mainbg clearfix">
				<h2 class="h2">三大优势 急速审批</h2>
				<ul class="layout">
					<li> <img src="/yzn/public/img/big-icon-1.png" width="93" alt="借款额度高">
						<h4>借款额度高</h4>
						<p>20~60周岁，有经济偿还能力</p>
					</li>
					<li> <img src="/yzn/public/img/big-icon-2.png" width="93" alt="贷款放款快">
						<h4>贷款放款快</h4>
						<p>申请资料齐全，最快一天放款</p>
					</li>
					<li> <img src="/yzn/public/img/big-icon-3.png" width="93" alt="周期方式灵活">
						<h4>周期方式灵活</h4>
						<p>借款期限自由，多种还款方式</p>
					</li>
				</ul>
			</div>
			<div class="tabBg h253">
				<div class="layout">
					<h2 class="h2">借款产品类型</h2>
					<h3 class="h3 mb45">多种借款产品类型 精准解决建工行业融资难题</h3>
					<div class="licai">
						<ul class="change-tabs">
							<li class="tab active"> <span>NO.1</span> <span>企业经营贷</span> </li>
							<li class="tab"> <span>NO.2</span> <span>建材供应贷</span> </li>
							<li class="tab"> <span>NO.3</span> <span>小微企业贷</span> </li>
							<li class="tab"> <span>NO.4</span> <span>项目承包贷</span> </li>
							<li class="tab"> <span>NO.5</span> <span>精英担保贷</span> </li>
						</ul>
					</div>
				</div>
			</div>
			<div class="goods-list">
		
				<div class="goods item1 active">
					<div class="layout">
						<div class="desc desc-h2">
							<h2 class="h2">NO.1企业经营贷</h2>
							<p>企业经营贷是小猪理财针对具备建筑企业资质等级和安全生产许可，有一定政府在建工程、应收账款，现金流稳定、充沛，且具备持续的经营能力和较强还款能力的建筑企业设计的一款短期金融产品。借款企业必须经过小猪理财风控团队的实地尽职调查，同时通过相关科技及数据系统查询后，确认具备较强履约能力的建筑企业。由借款企业股东等自然人作为担保方，对借款进行无限连带责任担保。借款企业在本平台上的借款总额不超过100万元。
							</p>
						</div>
						
					</div>
				</div>
			
				<div class="goods item2">
					<div class="layout">
						<div class="desc desc-h2">
							<h2 class="h2">NO.2建材供应贷</h2>
							<p>建材供应贷是小猪理财基于核心企业和上游企业的业务往来关系的基础之上，设计出的一款围绕核心企业，服务于上游企业的短期金融产品。借款企业是核心企业的上游材料/劳务供应企业，与核心企业签署了供销采购/劳务合同，在核心企业具有一定的应收账款，借款资金仅用于借款企业的短期经营周转。由核心企业作为担保方，对借款进行无限连带责任担保。借款企业在本平台上的借款总额不超过100万元。</p>
							
						</div>
						
					</div>
				</div>
			
				<div class="goods item3">
					<div class="layout clearfix">
						<div class="desc desc-h2">
							<h2 class="h2">NO.3小微企业贷</h2>
							<p>小微企业贷是小猪理财针对具备合法经营资格，持续盈利的中小微企业经营性资金需求设计的一款短期金融产品。借款企业必须经过小猪理财风控团队的风险审核，借款企业是产品有市场、经营有效益、业务稳定、信用记录良好、持续发展能力较强的成长型中小微企业，具备还款能力，还款意愿良好。借款资金仅限用于借款企业自身的经营性资金周转，单家借款企业在本平台上的借款总额不超过100万元。</p>
							
						</div>
						
					</div>
				</div>
			
				<div class="goods item4">
					<div class="layout">
						<div class="desc desc-h2">
							<h2 class="h2">NO.4项目承包贷</h2>
							<p>项目承包贷是小猪理财针对与核心企业签署了承包协议的项目承包方设计的一款短期金融产品。借款方有稳定的收入来源，并承接有在建工程项目，具备一定的还款能力，同时由经营正常，资质齐全，资金流健康，应收账款较多，具有一定担保能力的核心企业对借款方进行担保，资金用于该借款方承包的工程项目建设。</p>
							
						</div>
						
					</div>
			</div>
				<div class="goods item5">
					<div class="layout">
						<div class="desc desc-h2">
							<h2 class="h2">NO.5精英担保贷</h2>
							<p>精英担保贷是小猪理财基于核心企业的在建工程、施工资质、经营状况、企业实力及企业信用的基础上，为核心企业的精英人士（建造师、九大员、股东亲属、公司员工）所设计的一款不高于20万元的短期小额金融产品。资金用于核心企业内部经营、投标经营、项目投标保证金缴纳、项目履约保证金缴纳等。借款人为核心企业的精英人士（建造师、九大员、股东亲属、公司员工），由核心企业作为担保方，对借款进行无限连带责任担保。由核心企业对项目进行担保，每个标的的材料合同及监管均需小猪理财严格审核。</p>
							
						</div>
						
					</div>
				</div>
			</div>
			<div class="clear-both"></div>
			<!--申请流程图-->
			<div class="tabBg h550">
				<div class="layout setup-image">
					<h2 class="h2 mt55">四步审批 急速放款</h2>
					<h3 class="h3 mb45">更便捷的借款流程，四步搞定</h3>
					<ul class="list-setup clearfix">
						<li> <img src="/yzn/public/img/small-icon-1.png" width="110" alt="填写借款资料">
							<p>01填写借款资料</p>
						</li>
						<li class="dash"><i class="icon-dash"></i></li>
						<li> <img src="/yzn/public/img/small-icon-2.png" width="110" alt="信用调查审核">
							<p>02信用调查审核</p>
						</li>
						<li class="dash"><i class="icon-dash"></i></li>
						<li> <img src="/yzn/public/img/small-icon-3.png" width="110" alt="借款标审核并线">
							<p>03借款标审核上线</p>
						</li>
						<li class="dash"><i class="icon-dash"></i></li>
						<li> <img src="/yzn/public/img/small-icon-4.png" width="110" alt="借款成功">
							<p>04筹款成功资金入账</p>
						</li>
					</ul>
					
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