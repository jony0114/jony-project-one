<?
//开始即时到帐
if(0==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\cacert.pem';
require_once("lib/alipay_submit.class.php");
$total_fee = $dmoney;//付款金额
$anti_phishing_key = "";//防钓鱼时间戳
$exter_invoke_ip = "";//客户端的IP地址
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
//结束即时到帐
//开始担保交易
}elseif(1==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\db_cacert.pem';
require_once("lib/alipay_submit.class.php");
$price = $dmoney;
$quantity = "1";//商品数量
$logistics_fee = "0.00";//物流费用
$logistics_type = "EXPRESS";//物流类型
$logistics_payment = "SELLER_PAY";//物流支付方式
$receive_name = $_SESSION[FCWuser];//收货人姓名
$receive_address = $_POST['WIDreceive_address'];//收货人地址
$receive_zip = "";//收货人邮编
$receive_phone = "";//收货人电话号码
$receive_mobile = "";//收货人手机号码
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
//结束担保交易

//开始双功能
}elseif(2==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\t_cacert.pem';
require_once("lib/alipay_submit.class.php");
$price = $dmoney;
$payment_type = "1";
$quantity = "1";
$logistics_fee = "0.00";
$logistics_type = "EXPRESS";
$logistics_payment = "SELLER_PAY";
$receive_name = $_SESSION[FCWuser];//收货人姓名
$receive_address = $_POST['WIDreceive_address'];//收货人地址
$receive_zip = "";//收货人邮编
$receive_phone = "";//收货人电话号码
$receive_mobile = "";//收货人手机号码
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
//结束双功能
}

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "正在跳转，请稍候");
echo $html_text;
exit;
?>