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
$allname=webname."���߳�ֵ";
$allnum=sqlzhuru($_POST[t1]);
$dingbh=time().rnd_num(1000);	
$dmoney=sqlzhuru($_POST[t1]);
intotable("fcw_dingdang","bh,ddbh,uid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$dingbh."','".$_SESSION[FCWuser]."','".$sj."','".$uip."',".$dmoney.",'�ȴ���Ҹ���','','�Ƹ�ͨ',0");

require_once ("classes/RequestHandler.class.php");
require_once ("tenpay_config.php");
$curDateTime = date("YmdHis");
 
  
  //date_default_timezone_set(PRC);
		$strDate = date("Ymd");
		$strTime = date("His");
		
		//4λ�����
		$randNum = rand(1000, 9999);
		
		//10λ���к�,�������е�����
		$strReq = $strTime . $randNum;
		 /* �̼ҵĶ����� */
  	$mch_vno = $dingbh;
	
	
	
	
}

if(sqlzhuru($_POST[R1])=="tenpay"){$nbtv="0";}else{$nbtv=sqlzhuru($_POST[R1]);}
?>
 
<HTML>
<HEAD>
<TITLE>�Ƹ�ͨ����ͨ��</TITLE>
</HEAD>
<BODY onLoad="document.directFrm.submit();">


<form action='tenpay.php' method='post' name='directFrm'>
<input type="hidden" value="1" name="trade_mode" > <!--��ʱ���ʣ����׷�ʽ-->
<input type="hidden" name="order_no" value="<?=$dingbh?>" > <!--�������-->
<input name="product_name" type="hidden" value="<?=webname?>����̨����" > <!--������Ŀ-->
<input name="remarkexplain" type="hidden" value="��" > <!--��ע-->
<input type="hidden" name="order_price" value="<?=$dmoney?>"> <!--������-->
<input type="hidden" name="bank_type_value" value="<?=$nbtv?>"  id="bank_type_value">
</form>


</body>
</html>
