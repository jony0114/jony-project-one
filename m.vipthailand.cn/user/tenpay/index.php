<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
sesCheck();

if(sqlzhuru($_POST[jvs])=="pay"){
zwzr();

$sj=date("Y-m-d H:i:s");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$allname=webname."在线充值";
$allnum=sqlzhuru($_POST[t1]);
$dingbh=time().rnd_num(1000);	
$dmoney=sqlzhuru($_POST[t1]);
intotable("fcw_dingdang","bh,ddbh,uid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$dingbh."','".$_SESSION[FCWuser]."','".$sj."','".$uip."',".$dmoney.",'等待买家付款','','财付通',0");

require_once ("classes/RequestHandler.class.php");
require_once ("tenpay_config.php");
$curDateTime = date("YmdHis");
 
  
  //date_default_timezone_set(PRC);
		$strDate = date("Ymd");
		$strTime = date("His");
		
		//4位随机数
		$randNum = rand(1000, 9999);
		
		//10位序列号,可以自行调整。
		$strReq = $strTime . $randNum;
		 /* 商家的定单号 */
  	$mch_vno = $dingbh;
	
	
	
	
}

if(sqlzhuru($_POST[R1])=="tenpay"){$nbtv="0";}else{$nbtv=sqlzhuru($_POST[R1]);}
?>
 
<HTML>
<HEAD>
<TITLE>财付通付款通道</TITLE>
</HEAD>
<BODY onLoad="document.directFrm.submit();">


<form action='tenpay.php' method='post' name='directFrm'>
<input type="hidden" value="1" name="trade_mode" > <!--即时到帐，交易方式-->
<input type="hidden" name="order_no" value="<?=$dingbh?>" > <!--订单编号-->
<input name="product_name" type="hidden" value="<?=webname?>收银台结算" > <!--付款项目-->
<input name="remarkexplain" type="hidden" value="无" > <!--备注-->
<input type="hidden" name="order_price" value="<?=$dmoney?>"> <!--付款金额-->
<input type="hidden" name="bank_type_value" value="<?=$nbtv?>"  id="bank_type_value">
</form>


</body>
</html>
