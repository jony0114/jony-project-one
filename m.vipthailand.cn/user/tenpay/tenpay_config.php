<?php
require("../../config/conn.php");

$spname=webname."��ֵ";
$partner = $rowcontrol[tenpay1];                                  	//�Ƹ�ͨ�̻���
$key = $rowcontrol[tenpay2];											//�Ƹ�ͨ��Կ
$return_url = weburl."user/paylog.php";			//��ʾ֧�����ҳ��,*�滻��payReturnUrl.php����·��
$notify_url = weburl."user/tenpay/payNotifyUrl.php";			//֧����ɺ�Ļص�����ҳ��,*�滻��payNotifyUrl.php����·��
?>