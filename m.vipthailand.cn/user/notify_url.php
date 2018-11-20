<?php
require("../config/conn.php");
require_once("alipay.config.php");

//开始自定义函数
function updatetable($utable,$ures,$uwhere=""){ //修改库表
$sqlupdate="update ".$utable." set ".$ures." ".$uwhere;mysql_query("SET NAMES 'GBK'");mysql_query($sqlupdate);
}

function intotable($itable,$zdarr,$resarr){ //入库表
$sqlinto="insert into ".$itable."(".$zdarr.")values(".$resarr.")";mysql_query("SET NAMES 'GBK'");mysql_query($sqlinto);
}

function PointUpdateM($c_uid,$c_money){ /*会员金额值变更*/
 updatetable("fcw_user","money1=money1+(".$c_money.") where uid='".$c_uid."'");
}

function PointIntoM($c_uid,$c_tit,$c_money){ /*会员金额值追踪*/
 intotable("fcw_moneyrecord","bh,uid,tit,moneynum,sj,uip","'".time()."','".$c_uid."','".$c_tit."',".$c_money.",'".date('Y-m-d H:i:s')."','".$_SERVER['REMOTE_ADDR']."'");
}
//结束自定义函数

if(empty($rowcontrol[zftype])){$webzftype=0;}else{$webzftype=$rowcontrol[zftype];}
if($webzftype==0){$alipay_config['cacert']    = getcwd().'\\cacert.pem';}
elseif($webzftype==1){$alipay_config['cacert']    = getcwd().'\\db_cacert.pem';}

require_once("lib/alipay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功

	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号

	$trade_no = $_POST['trade_no'];

	//交易状态
	$trade_status = $_POST['trade_status'];
    switch($trade_status){
	  case "WAIT_BUYER_PAY";
	  $nddzt="等待买家付款";
	  break;
	  case "TRADE_FINISHED":
	  case "WAIT_SELLER_SEND_GOODS":
	  case "WAIT_BUYER_CONFIRM_GOODS":
	  case "TRADE_SUCCESS";
	  $nddzt="交易成功"; 
	  break;
      }


$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$dingdanbh=preg_split("/\|/",$out_trade_no);
$sql="select id,uid from fcw_user where id=".$dingdanbh[1];mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);$row=mysql_fetch_array($res);$uid=$row[uid];
$sql="select * from fcw_dingdang where ddbh='".$out_trade_no."' and uid='".$uid."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
if($row=mysql_fetch_array($res)){
 if(1==$row[ifok]){echo "success";exit;}
 if($trade_status=="TRADE_SUCCESS" || $trade_status=="TRADE_FINISHED" || $trade_status=="WAIT_SELLER_SEND_GOODS" || $trade_status=="WAIT_BUYER_CONFIRM_GOODS"){
  updatetable("fcw_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='".$trade_status."',ddzt='".$nddzt."',ifok=1 where id=".$row[id]);
  $money1=$row["money1"];
  PointIntoM($uid,"支付宝充值".$money1."元",$money1);
  PointUpdateM($uid,$money1);
  updatetable("fcw_dingdang","ifok=1 where id=".$row[id]);
  echo "success";exit;
 }
}


}
?>