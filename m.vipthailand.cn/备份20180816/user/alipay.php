<?
//��ʼ��ʱ����
if(0==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\cacert.pem';
require_once("lib/alipay_submit.class.php");
$total_fee = $dmoney;//������
$anti_phishing_key = "";//������ʱ���
$exter_invoke_ip = "";//�ͻ��˵�IP��ַ
$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset'])));
//������ʱ����
//��ʼ��������
}elseif(1==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\db_cacert.pem';
require_once("lib/alipay_submit.class.php");
$price = $dmoney;
$quantity = "1";//��Ʒ����
$logistics_fee = "0.00";//��������
$logistics_type = "EXPRESS";//��������
$logistics_payment = "SELLER_PAY";//����֧����ʽ
$receive_name = $_SESSION[FCWuser];//�ջ�������
$receive_address = $_POST['WIDreceive_address'];//�ջ��˵�ַ
$receive_zip = "";//�ջ����ʱ�
$receive_phone = "";//�ջ��˵绰����
$receive_mobile = "";//�ջ����ֻ�����
$parameter = array(
		"service" => "create_partner_trade_by_buyer",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"price"	=> $price,
		"quantity"	=> $quantity,
		"logistics_fee"	=> $logistics_fee,
		"logistics_type"	=> $logistics_type,
		"logistics_payment"	=> $logistics_payment,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"receive_name"	=> $receive_name,
		"receive_address"	=> $receive_address,
		"receive_zip"	=> $receive_zip,
		"receive_phone"	=> $receive_phone,
		"receive_mobile"	=> $receive_mobile,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);
//������������

//��ʼ˫����
}elseif(2==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\t_cacert.pem';
require_once("lib/alipay_submit.class.php");
$price = $dmoney;
$payment_type = "1";
$quantity = "1";
$logistics_fee = "0.00";
$logistics_type = "EXPRESS";
$logistics_payment = "SELLER_PAY";
$receive_name = $_SESSION[FCWuser];//�ջ�������
$receive_address = $_POST['WIDreceive_address'];//�ջ��˵�ַ
$receive_zip = "";//�ջ����ʱ�
$receive_phone = "";//�ջ��˵绰����
$receive_mobile = "";//�ջ����ֻ�����
$parameter = array(
		"service" => "trade_create_by_buyer",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"price"	=> $price,
		"quantity"	=> $quantity,
		"logistics_fee"	=> $logistics_fee,
		"logistics_type"	=> $logistics_type,
		"logistics_payment"	=> $logistics_payment,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"receive_name"	=> $receive_name,
		"receive_address"	=> $receive_address,
		"receive_zip"	=> $receive_zip,
		"receive_phone"	=> $receive_phone,
		"receive_mobile"	=> $receive_mobile,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);
//����˫����
}

//��������
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "������ת�����Ժ�");
echo $html_text;
exit;
?>