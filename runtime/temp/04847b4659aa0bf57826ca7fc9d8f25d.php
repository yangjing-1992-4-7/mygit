<?php /*a:3:{s:69:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\index\borrow.html";i:1615865033;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\head.html";i:1615865700;s:68:"E:\UPUPW_AP7.0_64\htdocs\yzn\application\index\view\public\foot.html";i:1615866737;}*/ ?>
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
<style>
	.container{
		height: auto;
	}
</style>
		<div class="container">
			<a href="javascript:void(0);" class="cursorDefa">
				<div class="banner licai"></div>
			</a>
			<!--理财专区-->
			<div class="financing-block layout">
				<div class="financing-search">
					<div class="order-list">
						<div class="order-item">
							<p><span>标的类型：</span></p>
							<ul class="order-list" id="bd-type">
								<li id="type_all" class="all active">全部</li>
								<li id="type_99">新手专享</li>
								<li id="type_6">企业经营贷</li>
								<li id="type_3">建材供应贷</li>
								<li id="type_7">小微企业贷</li>
								<li id="type_4">项目承包贷</li>
								<li id="type_5">精英担保贷</li>
							</ul>
						</div>
						<div class="order-item">
							<p><span>借款期限：</span></p>
							<ul class="order-list" id="time">
								<li id="term_all" class="all active">全部</li>
								<li id="term_10-30">30天</li>
								<li id="term_10-60">60天</li>
								<li id="term_10-90">90天</li>
								<!--<li id="term_1-3">1~3个月</li>-->
								<!--<li id="term_month">月标</li>-->
							</ul>
						</div>
						<div class="order-item">
							<p><span>年化利率：</span></p>
							<ul class="order-list" id="rate">
								<li id="rate_all" class="all active">全部</li>
								<!--<li id="rate_10-15">10%~15%</li> <li id="rate_15-1000">15%以上</li>-->
								<li id="rate_10down">10%以下</li>
								<li id="rate_10-13">10%~13%</li>
								<li id="rate_13up">13%以上</li>
								<li id="rate_plus">加息</li>
							</ul>
						</div>
						<div class="order-item" style="display:none;">
							<p><span>还款方式：</span></p>
							<ul class="order-list" id="type">
								<li id="repmet_all" class="all active">全部</li>
								<!--<li id="repmet_1">按月付息 到期还本</li>-->
								<li id="repmet_2">一次性还本付息</li>
								<!--<li id="repmet_3">等额本金</li>-->
								<!--<li id="repmet_4">等额本息</li>-->
							</ul>
						</div>
						<div class="order-item">
							<p><span>标的状态：</span></p>
							<ul class="order-list" id="state">
								<li id="state_all" class="all active">全部</li>
								<li id="state_1">可投</li>
								<li id="state_2">复审中</li>
								<li id="state_3">已满标</li>
							</ul>
						</div>
					</div>
					
				</div>
				<!--标的搜索结束-->
				<div class="searchClick">
					<ul id="sorts" class="sorts">
						<li id="sorts_all1">
							<p>默认排序</p>
						</li>
						<li id="sorts_term" class="upDowns" data="1">
							<p>项目期限</p><i class="sortsup"></i><i class="sortsdown"></i></li>
						<li id="sorts_rate" class="upDowns" data="1">
							<p>年化利率</p><i class="sortsup"></i><i class="sortsdown"></i></li>
					</ul>
				
				</div>
				<!--理财列表-->
				<ul class="financing-block-list " id="output">
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807190029</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_75879">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807190028</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_75878">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807130164</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_74836">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807130024</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_74687">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807110109</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_74240">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">企业经营贷-JGD201807110017</a></h1>
								<div class="fl"> <span title="自然人股东担保" class="dan circle-desc"></span> <span title="借款企业为应收账款多、资金流健康、经营情况较好的施工企业" class="circle-desc ying"></span> <span class="new_tag">单笔出借1万送8.88，单笔出借2万送18.88</span> </div>
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
									<p class="sub-title">80000.00</p>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_74041">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807110149</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_74280">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					<li class="financing-block-item ">
						<div class="left">
							<div class="name">
								<h1> <a href="<?php echo url('index/detail'); ?>">建材供应贷-GYD201807100099</a></h1>
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
							<a href="<?php echo url('index/detail'); ?>" class="btn btn-buying btn-abs borrow_73691">已满标</a>
							<p class="p-balance"> 可投金额：0元</p>
						</div>
						<!--进度条百分比-->
					</li>
					
				</ul>
				<!--理财列表结束-->
				<div class="tip">
					<p>注：市场有风险 出借需谨慎</p>
				</div>
				<!--分页列表-->
				<div class="pages">
					<div class="page-layout">
						<div class="page-list">
							<a class="page-item active">1</a>
							<a class="page-item" href="/loan/index/lists/p/2"> 2</a>
							<a class="page-item">...</a>
							<a class="page-item" href="/loan/index/lists/p/959"> 959 </a>
							<a class="page-item" href="/loan/index/lists/p/960"> 960 </a>
							<a class="page-item btn" href="/loan/index/lists/p/2">下一页</a>
							<a class="page-item btn" href="/loan/index/lists/p/960">尾页</a> <input type="text" size="3" title="请输入要跳转到的页数并回车" onkeydown="javascript:if(event.charCode==13||event.keyCode==13){if(!isNaN(this.value)){ document.location.href='/loan/index/lists/p/'+this.value+'';}return false;}" />
							<a class="jump-do" href="javascript:;" onclick="PageJump('/loan/index/lists/p/*')">跳转</a>
						</div>
					</div>
				</div>
				<!--分页列表结束-->
			</div>
			<!--理财专区结束-->
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