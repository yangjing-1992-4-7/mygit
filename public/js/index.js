$(document).ready(function(){
	var mySwiper = new Swiper ('.swiper-container', {
    loop: true, // 循环模式选项
    speed:300,
    // 如果需要分页器
    pagination: {
      el: '.swiper-pagination',
    },
    
	autoplay : {
	    delay:3000
	},
	
    
  })     
	
	$(document).scroll(function(){
	    var top=$(document).scrollTop();
	
	    if(top>100){
	    	$("#siteBackToTop_small_box").show();
	    }else{
	    	$("#siteBackToTop_small_box").hide();
	    }
	})
	
	
	$('#siteBackToTop_small_box').bind('click',function(){
	　　　　var s=0;
	　　　　$('body,html').animate({
	　　　　　　scrollTop:s,
	　　　　},200)
	})
		
	$(".itemCenter").hover(function(){
		$(this).addClass("itemHover");
	},function(){
		$(this).removeClass("itemHover");
	})
	
	$(".validatecode_tip,.validatecode_img").click(function(){
		$(".validatecode_img").attr("src",'/captcha.html');
	})
	
	$(".formTabButton").click(function(){
		$(this).addClass("formTabButtonHover");
		$(this).siblings().removeClass("formTabButtonHover");
		
		$(".formTabCntId").removeClass("formTabCntIdHover");
		$(".formTabCntId").eq($(this).index()/2).addClass("formTabCntIdHover");
	})
	
	$(".modul_box_right .tab li").click(function(){
		$(this).addClass("cur");
		$(this).siblings().removeClass("cur");
		$(this).parent().siblings(".list").hide();
		$(this).parent().siblings(".list").eq($(this).index()).show();
	})
	
	
	//书讯快递循环垂直向上滚动
   function movedome(dom){
      var margintop=0;//上边距的偏移量
      var stop=false;
      setInterval(function(){
         if(stop==true){
             return;
         }
         $(dom).children("li").first().animate({"margin-top":margintop--},0,function(){
            var $li=$(this);
            
            if(!$li.is(":animated")){
            	//第一个li的动画结束时
              if(-margintop>$li.height()+10){
                 $li.css("margin-top","0px").appendTo($(dom));
                 margintop=0;
              }
            }
         });
      },50);
   //鼠标放到快递信息(ul)上时
   $(dom).hover(function(){
       $(this).css("cursor","pointer");
          stop=true;//停止动画
       },function(){
           stop=false;//开始动画
       });
   }
   movedome("#noticeScrollbar1732");
   movedome("#noticeScrollbar1733");
   movedome("#noticeScrollbar1734");
	
	
	
	$(".s_1 .m").click(function(){
			var tj_name=$(".tj_nickname").val();
			var tj_tel=$(".phone_number").val();
			if(tj_name==''){
				Swal.fire({
					title:'专利名称不能为空',
					type:'error'
				})
			}else{
				if(tj_tel==''){
					Swal.fire({
						title:'手机号码不能为空',
						type:'error'
					})
				}else{
					if(!(/^1[3|4|5|7|8|9]\d{9}$/.test(tj_tel))){
						Swal.fire({
							title:'手机号码格式不正确',
							type:'error'
						})
					}else{
						$.ajax({
							type:"post",
							url:"tj",
							async:true,
							data:{"tj_name":tj_name,"tj_tel":tj_tel},
							success:function(data){							
								if(data==1){
									Swal.fire({
										title:'提交成功',
										type:'success'
									})

									$(".tj_nickname").val('');
				                    $(".phone_number").val('');
								}else if(data==0){
									Swal.fire({
										title:'一天只能申请查询3次',
										type:'error'
									})
								}else if(data==2){
									Swal.fire({
										title:'查询失败',
										type:'error'
									})
								}
								
							}
						});
					}
				}
			}
		})
})

