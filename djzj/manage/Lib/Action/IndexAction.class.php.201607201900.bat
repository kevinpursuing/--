<?php
/**
 *
 * @package 
 * @since 1.0
 * @todo 首页、列表页面、详细页
 */
 
class IndexAction extends AllAction{

	/**
	 * ------------------------------
	 * 权限判断
	 * ------------------------------
	 */
	function pan_quan_ajax($data){  //ajax判断
		$pan=in_array($data,$_SESSION['admin_quan']);
        if($pan){
			return true;
		}else{
			return false;
		}
	}
	function pan_quan($data){ //php跳转判断
		$pan=in_array($data,$_SESSION['admin_quan']);
        if(!$pan){
			$this->assign('jumpUrl', U('Index/index'));
			$this->error('您权限不足');
		}
	}
	//首页shishi
//	function indexshishi(){
//		$del = M("gg_lbimg")->where("id>0")->setField('webid','1');//1为发布
//        echo $del?'1':'0';
//		$this->display('index');
//	}
	 
	//首页
	function index(){
		if(empty($_SESSION['manage_id'])){
			$this->assign('jumpUrl', U('User/login'));
			$this->error('请先登录');
		}
		$today_cs_time=strtotime(date("Y-m-d",time())." 00:00:00");
		$yestday_cs_time=$today_cs_time-(60*60*24);
		//总用户数
		$user_count=M("users")->count();
		$this->assign('user_count', $user_count);
		//昨日新用户
		$yestday_user_count=M("users")->where("ctime>=".$yestday_cs_time." and ctime<".$today_cs_time."")->count();
		$this->assign('yestday_user_count', $yestday_user_count);
		//昨日总充值数
		$yestday_chongzhi=M("user_golds_record")->field("changeAmount")->where("fromid=4 and ctime>=".$yestday_cs_time." and ctime<".$today_cs_time."")->select();
		foreach($yestday_chongzhi as $k=>$v){
			$yestday_chongzhi_golds=$yestday_chongzhi_golds+$v['changeAmount'];
		}
		$yestday_chongzhi_rmb=$yestday_chongzhi_golds/100;
		$this->assign('yestday_chongzhi_rmb', $yestday_chongzhi_rmb);
		//昨日总兑换数
		$yestday_duihuan=M("user_golds_record")->field("changeAmount")->where("txstate>=1 and ctime>=".$yestday_cs_time." and ctime<".$today_cs_time."")->select();
		foreach($yestday_duihuan as $k=>$v){
			if(abs($v['changeAmount'])==2400){
				$yestday_duihuan_rmb=$yestday_duihuan_rmb+20;
			}else if(abs($v['changeAmount'])==5700){
				$yestday_duihuan_rmb=$yestday_duihuan_rmb+50;
			}else if(abs($v['changeAmount'])==11000){
				$yestday_duihuan_rmb=$yestday_duihuan_rmb+100;
			}
		}
		$this->assign('yestday_duihuan_rmb', $yestday_duihuan_rmb);
		//昨日竞猜人次
		$yestday_jcs=M("user_golds_record")->where("fromid IN (2,3) and ctime>=".$yestday_cs_time." and ctime<".$today_cs_time."")->select();
		$yestday_jc_count=count($yestday_jcs);
		$this->assign('yestday_jc_count', $yestday_jc_count);
		foreach($yestday_jcs as $k=>$v){
			$yestday_jcs_golds=$yestday_jcs_golds+abs($v['changeAmount']);
			if(!in_array($v['userId'], $yestday_jcs_userid_arr)){
				$yestday_jcs_userid_arr[]=$v['userId'];
			}
		}
		$yestday_jcs_golds=floor($yestday_jcs_golds);
		$this->assign('yestday_jcs_golds', $yestday_jcs_golds);
		$yestday_jcs_user_num=count($yestday_jcs_userid_arr);
		$this->assign('yestday_jcs_user_num', $yestday_jcs_user_num);
		
		
				
		$this->display();
	}



	
	
	
} 