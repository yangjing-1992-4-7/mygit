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
  
  $(".order-list li").click(function(){
  	 $(this).addClass("active");
  	 $(this).siblings().removeClass("active");
  })
  
  
  $(".about-menu li.other-title").click(function(){
  	 $(this).addClass("active");
  	 $(this).siblings().removeClass("active");
  })
  
  $(".licai .tab").click(function(){
  	 $(this).addClass("active");
  	 $(this).siblings().removeClass("active");
  	 $(".goods-list .goods").removeClass("active");
  	 $(".goods-list .goods").eq($(this).index()).addClass("active");
  })
  
  $(".action-tab .tab").click(function(){
  	 $(this).addClass("active");
  	 $(this).siblings().removeClass("active");
  	 $(".person-info").removeClass("layout");
  	 $(".person-info").eq($(this).index()).addClass("layout");
  })
})  
