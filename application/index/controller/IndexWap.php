<?php
namespace app\index\controller;
use app\index\model\Category as Category_Model;
use app\index\model\Article as Article_Model;
use app\admin\model\Flink as Flink_Model;
use app\index\model\Tj as Tj_Model;
use think\Controller;
use think\Cache;
use think\Db;
use think\db\Where;

class IndexWap extends Controller{
	 //初始化
    protected function initialize(){
        $this->Category_Model = new Category_Model;
        $this->Article_Model = new Article_Model;
        $this->Tj_Model = new Tj_Model;
        $this->Flink_Model = new Flink_Model;
        
        if($this->request->action()=='col_wap'){
        	config('title','专利申请代理查询_发明专利申请流程及费用_如何办理实用新型专利-大牛知识产权');
        	config('description','大牛专利申请网,国知局认证专利代理机构,正规专利申请服务平台,经验丰富,覆盖发明专利,外观设计专利,实用新型专利,我们拥有资深、权威的专利团队，全程一对一包办,价格实惠,免费评估');
        	config('keywords','专利代理,专利申请公司,专利交易,发明专利,实用新型专利,外观专利服务');    	
        }else if($this->request->action()=='enterprise_wap'){
        	config('title','2020高新技术企业申报_高新技术企业认定条件、材料、流程咨询_高企认定-大牛知识产权');
        	config('description','高企认定,高新技术企业认证服务中心-大牛知识产权 官方认证平台,行业经验丰富,成功率高,江西高新技术企业认定,享受减免优惠，资金奖励项目加分，提升企业竞争力');
        	config('keywords','高新技术企业认定,高企认定条件,高新企业认定费用及流程');       	
        }else if($this->request->action()=='trademark_wap'){
        	config('title','商标注册申请_商标注册流程及费用_商标查询-大牛知识产权');
        	config('description','怎么注册商标,商标被驳回怎么办,找大牛专业商标代理机构,免费人工准确查询,24小时在线专业商标顾问服务,高效快捷,快速办理,极速注册');
        	config('keywords','商标注册,商标申请,商标查询,商标流程及费用');       	
        }else if($this->request->action()=='copyright_wap'){
        	config('title','版权登记办理中心_著作权登记_版权登记流程及费用-大牛知识产权');
        	config('description','登记版权多少钱,版权登记哪家好,申请著作权登记首选大牛知识产权网,专业团队,24小时在线服务,一站式版权登记服务平台,免费查询,高通过率无隐形收费');
        	config('keywords','版权登记,版权登记流程,作品版权登记,版权登记费用');       	
        }else if($this->request->action()=='qualifications_wap'){
        	config('title','两化融合体系_知识产权贯标_iso体系_条码_绿色有机食品认证_资质认证-大牛知识产权');
        	config('description','大牛网致力于为企业提供两化融合,管理体系,知识产权贯标申请,条形码,有机绿色认证等业务,专业技术团队,下证周期短,价格优惠');
        	config('keywords','两化融合体系,知识产权贯标,iso体系,有机食品认证');       	
        }else if($this->request->action()=='capital_wap'){
        	config('title','重点研发计划项目_江西省重点新产品_工程技术研究中心_重点实验室_资金项目-大牛知识产权');
        	config('description','大牛网拥有多年重点研发计划项目,江西省重点新产品,工程技术研究中心,重点实验室,专业化小巨人,瞪羚企业项目,一企一技,新型研发机构等科技项目申报服务,为众多企业申报成功各项科技项目,团队经验丰富,流程简洁');
        	config('keywords','重点研发计划项目,江西省重点新产品,工程技术研究中心');       	
        }else if($this->request->action()=='property_wap'){
        	config('title','专利交易_商标版权买卖网_专利转让交易平台-大牛知识产权');
        	config('description','大牛知识产权网拥有优质专利商标版权资源,行业覆盖广,专业服务团队,高效办理专利商标交易,全国服务热线400-102-0176');
        	config('keywords','专利转让,商标转让,版权交易');       	
        }else if($this->request->action()=='news_wap'){
        	config('title','知识产权资讯_专利高企商标新闻_版权著作权知识-大牛知识产权网');
        	config('description','大牛知识产权资讯频道,第一时间为您推送最新知识产权资讯,专利高企新闻,版权商标知识,服务全球客户,专业,快捷,24小时服务热线400-102-0176');
        	config('keywords','知识产权资讯,专利高企新闻,版权商标知识');       	
        }else if($this->request->action()=='place_wap'){
        	config('title','抚州高新技术企业申报_抚州高企认定条件、材料、流程咨询-南昌大牛知识产权');
        	config('description','抚州高企认定,抚州高新技术企业认证服务中心-南昌大牛知识产权  行业经验丰富,成功率高,江西高新技术企业认定,享受减免优惠,资金奖励项目加分,提升企业竞争力');
        	config('keywords','抚州高新技术企业认定,抚州高企认定条件,抚州高新企业认定费用及流程');       	
        }else{
        	config('title','专利申请-申请专利-高企认定流程-商标注册-查询代理机构-大牛知识产权');
        	config('description','大牛知识产权为您提供专利申请,高新技术企业认定,,商标注册一站式服务,专业团队24小时一对一在线服务,江西专利申请流程便捷,多年行业经验,一站式知识产权交易与代理平台');
        	config('keywords','专利申请,高企认定流程,版权登记流程及费用,商标注册');       	
        }
        
        //高企认定
		$list1=$this->Article_Model->get_where_list(10);
		//专利申请
		$list2=$this->Article_Model->get_where_list(9);		
		//商标注册
		$list3=$this->Article_Model->get_where_list(14);
		//版权注册
		$list4=$this->Article_Model->get_where_list(20);
		$this->assign('list1',$list1);
    	$this->assign('list2',$list2);
    	$this->assign('list3',$list3);
    	$this->assign('list4',$list4);
	}
	
    public function index_wap(){
    	if(!is_mobile()){
    		$this->redirect('/');
    	}
		//友情链接
		$flink=$this->Flink_Model->get_flink_list(1);	
	    
	    
	    
		$this->assign('flink',$flink);
        return $this->fetch();
    }
	
	//专利申请
	public function col_wap(){
	
	    
        return $this->fetch();
	}
	
	//高企认定
	public function enterprise_wap(){
		 return $this->fetch();
	}
	
	//商标注册
	public function trademark_wap(){
		 return $this->fetch();
	}
	
	//版权登记
	public function copyright_wap(){
		 return $this->fetch();
	}
	
	//知产交易
	public function property_wap(){
		 return $this->fetch();
	}
	
	//资质认证
	public function qualifications_wap(){
		 return $this->fetch();
	}
    
    //资质项目
	public function capital_wap(){
		 return $this->fetch();
	}
    
    //新闻资讯
	public function news_wap(){
		$id=$this->request->param('id/d');
    	//获取文章栏目列表        
        $cate_list=$this->Category_Model->get_news_category();
    	$list=$this->Article_Model->get_news_list($id,'all');

    	$this->assign('id',$id);
    	$this->assign('list',$list);
    	$this->assign('cate_list',$cate_list);
        return $this->fetch();
	}
    
    
    //文章详情
    public function news_info_wap(){
    	$id=$this->request->param('id/d');
    	
    	//获取文章详情        
        $info=$this->Article_Model->get_news_info($id);
        //获取文章推荐列表        
        $list=$this->Article_Model->get_news_recommend_list($id); 
        //上一篇
        $last=$this->Article_Model->get_last($info['catid'],$id); 
        //下一篇
        $next=$this->Article_Model->get_next($info['catid'],$id); 
               
    	$this->assign('info',$info);
    	$this->assign('list',$list);
    	$this->assign('last',$last);
    	$this->assign('next',$next);
    	return $this->fetch();
    }
    
    //地区
    public function place_wap(){
    	$place=$this->request->param('place/s');
    	
    	$title='抚州专利申请_抚州专利申请流程及费用_抚州专利查询-大牛知识产权';
    	$description='抚州专利申请,抚州专利申请流程,申请抚州专利首选江西大牛专利网,官方认证专利代理平台,提供专利免费查询,专业团队一对一服务,费用透明,流程简单,轻松拿证';
        $keywords='抚州专利申请,抚州专利申请流程,抚州专利费用';
        
    	config('title',strtr($title,array('抚州'=>$place)));
    	config('description',strtr($description,array('抚州'=>$place)));
    	config('keywords',strtr($keywords,array('抚州'=>$place)));       	
    	
    	$this->assign('place',$place);
    	return $this->fetch();
    }
}	
?>