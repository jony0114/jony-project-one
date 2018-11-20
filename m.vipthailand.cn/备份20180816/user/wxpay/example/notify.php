<?php
include("../../../config/conn.php");
include("../../../config/function.php");

ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Notify.php';
require_once 'log.php';

//��ʼ����־
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//��ѯ����
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$sql="select * from fcw_dingdang where wxddbh='".$result[out_trade_no]."' and ifok=0";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
if($row=mysql_fetch_array($res)){
 updatetable("fcw_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='TRADE_SUCCESS',ddzt='���׳ɹ�',ifok=1 where id=".$row[id]);
 $money1=$result[total_fee]/100;
 PointIntoM($row[uid],"΢�ų�ֵ".$money1."Ԫ",$money1);
 PointUpdateM($row[uid],$money1);
}

			return true;
		}
		return false;
	}
	
	//��д�ص�������
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "�����������ȷ";
			return false;
		}
		//��ѯ�������ж϶�����ʵ��
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "������ѯʧ��";
			return false;
		}
		return true;
	}
}

Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
