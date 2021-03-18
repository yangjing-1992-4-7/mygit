<?php
// +----------------------------------------------------------------------
// | Yzncms [ 御宅男工作室 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018 http://yzncms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 御宅男 <530765310@qq.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 栏目模型
// +----------------------------------------------------------------------
namespace app\index\model;

use app\index\model\Category as Category_Model;
use think\facade\Cache;
use \think\Db;
use \think\Model;
use \think\db\Where;

/**
 * 模型
 */
class Article extends Model{
    //获取文章列表
    public function  get_news_list($id=0,$page=''){
    	$where=new Where;
    	$where['article.status']=1;
    	if($id){
    		$where['article.catid']=$id;
    	}
		
		if($page=='all'){
			$list=Db::name('article')
			->alias('article')
			->leftjoin('article_data','article.id=article_data.did')
			->leftjoin('attachment','attachment.id=article.image')
	        ->field('article.*,attachment.path,article_data.content')
			->where($where)->order(['article.updatetime'=>'desc'])
			->select();
		}else{
			$list=Db::name('article')
			->alias('article')
			->leftjoin('article_data','article.id=article_data.did')
			->leftjoin('attachment','attachment.id=article.image')
	        ->field('article.*,attachment.path,article_data.content')
			->where($where)->order(['article.updatetime'=>'desc'])
			->paginate(config('article_pagenum')); 	
		}
						
		
		
    
        foreach($list as $k=>$v){
        	$v['update_time']=date('Y-m-d',$v['updatetime']);
        	if($v['tags']){
        		$v['tags']=explode(',',$v['tags']);
        	}      
        	$list[$k] = $v;
        }
        
    	return $list;
    }
    
    
    //获取文章详情
    public function  get_news_info($id=0){
    	$where=new Where;
    	$where['article.status']=1;
    	if($id){
    		$where['article.id']=$id;
    	}
						
		$info=Db::name('article')
		->alias('article')
		->leftjoin('category','article.catid=category.id')
		->leftjoin('article_data','article.id=article_data.did')
		->leftjoin('attachment','attachment.id=article.image')
        ->field('article.*,attachment.path,article_data.content,category.catname')
		->where($where)->order(['article.listorder','article.updatetime'=>'desc'])
		->find(); 	
		
        
    	return $info;
    }
    
    //上一篇文章
    public function get_last($catid='',$id=''){
    	$list=$this->get_news_list($catid,'all');
    	foreach($list as $k=>$v){
    		if($v['id']==$id){
    			$last=$list[$k-1];
    		}
    	}  
    	return $last;
    }
    
    //上一篇文章
    public function get_next($catid='',$id=''){
    	$list=$this->get_news_list($catid,'all');
    	foreach($list as $k=>$v){
    		if($v['id']==$id){
    			$next=$list[$k+1];
    		}
    	}  
    	return $next;
    }
    
    //获取文章推荐列表
    public function  get_news_recommend_list($id=0){
    	$where=new Where;
    	$where['article.status']=1;
		$cate_id=Db::name('article')->where('id',$id)->value('catid');		
		//相关文章
		$where['article.catid']=$cate_id;
		$where['article.id']=array('neq',$id);
		$list['relevant_list']=Db::name('article')
						->alias('article')			
						->leftjoin('attachment','attachment.id=article.image')
				        ->field('article.*,attachment.path')
						->where($where)->order(['article.listorder','article.updatetime'=>'desc'])
						->limit(3)
						->select();
						
		//热门文章
		$where=new Where;
		$where['article.id']=array('neq',$id);
		$list['hot_list']=Db::name('article')
						->alias('article')			
						->leftjoin('attachment','attachment.id=article.image')
				        ->field('article.*,attachment.path')
						->where($where)->order(['article.listorder','article.updatetime'=>'desc'])
						->limit(3)
						->select();				
		 	
		//右边文章
		$category=new Category_Model;
    	$cate_list=$category->get_news_category(3);     
    	   
        foreach($cate_list as $k=>$v){       	
        	$cate_list[$k]['article_list']=Db::name('article')
				->where('catid',$v['id'])->order(['listorder','updatetime'=>'desc'])
				->limit(5)
				->select(); 	
        }
		$list['right_list']=$cate_list;
    	return $list;
    }
    
    //获取搜索文章列表
    public function get_search_list($keyword=''){
    	$where=new Where;
    	$where['status']=1;
    	if($keyword){
    		$where['title']=array('like',"%".$keyword."%");
    	}
		$list=Db::name('article')
		      ->where($where)
		      ->paginate(10); 	
		
    
//      foreach($list as $k=>$v){
//      	$v['update_time']=date('Y-m-d',$v['updatetime']);    
//      	$list[$k] = $v;
//      }
        
    	return $list;	
    }
    
    public function get_where_list($id='',$order=''){
    	$where=new Where;
    	$where['article.status']=1;
    	if($id){
    		$where['article.catid']=$id;
    	}
    	if($order='hits'){
    		$list=Db::name('article')
    		  ->alias('article')			
			  ->leftjoin('attachment','attachment.id=article.image')
	          ->field('article.*,attachment.path')
		      ->where($where)
		      ->order('article.hits')
		      ->limit(6)
		      ->select();
    	}else{
    		$list=Db::name('article')
    		  ->alias('article')			
			  ->leftjoin('attachment','attachment.id=article.image')
	          ->field('article.*,attachment.path')
		      ->where($where)
		      ->order(['article.listorder','article.updatetime'=>'desc'])
		      ->limit(6)
		      ->select(); 
    	}
		
		return $list;     
    }
}
