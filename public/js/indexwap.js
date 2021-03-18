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
	
	$(".tabs__header div").click(function(){
		$(this).siblings().removeClass("native");
		$(this).addClass("native");
		$(".news_wrap").addClass("hide");
		$(".news_wrap").eq($(this).index()).removeClass("hide");
	})
	
	
	
	$(".nav_but").click(function(){	

		$("#nav").toggleClass("hide");
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
              if(-margintop>$li.height()){
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
   movedome(".noticeScrollbar1");
   movedome(".noticeScrollbar2");
	
	
	
	$(".tabs__hea div").click(function(){
		$(this).siblings().removeClass("native");
		$(this).addClass("native");
		$(".wrap_cap").addClass("hide");
		$(".wrap_cap").eq($(this).index()).removeClass("hide");
	})

		

	
	
	$(".wrap_pro_zx").click(function(){
		    if($(this).hasClass("sb")){
		    	var title="商标名称不能为空";
		    }else{
		    	var title="专利名称不能为空";
		    }
			var tj_name=$(".wap_name").val();
			var tj_tel=$(".wap_tel").val();
			if(tj_name==''){
				Swal.fire({
					title:title,
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
							url:"/index/index/tj",
							async:true,
							data:{"tj_name":tj_name,"tj_tel":tj_tel},
							success:function(data){							
								if(data==1){
									Swal.fire({
										title:'提交成功',
										type:'success'
									})
			
									$(".wap_name").val('');
				                    $(".wap_tel").val('');
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
	
	$(".wrap_sli_but").click(function(){
			var tj_name=$(".wrap_name").val();
			var tj_tel=$(".wrap_tel").val();
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
							url:"/index/index/tj",
							async:true,
							data:{"tj_name":tj_name,"tj_tel":tj_tel},
							success:function(data){							
								if(data==1){
									Swal.fire({
										title:'提交成功',
										type:'success'
									})
			
									$(".wrap_name").val('');
				                    $(".wrap_tel").val('');
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

