<?php
set_time_limit(0);
include("../config/conn.php");
include("../config/function.php");
$ifdb=0;
if(!is_file("../config/userkey.dll")){$ifdb=1;}
else{
 $t=@read_file_content("../config/userkey.dll");
 $t1=preg_split("/\|/",$t);
 $w=$_SERVER['HTTP_HOST'];
 $ifdb=0;
 if(!strstr($w,$t1[0])){$ifdb=1;}
 $vadf8xe8w=@htmlget("http://www.yjcode.com/vip/vipcheck.php?md5v=".$t."&web=".$t1[0]);
 if($vadf8xe8w=="err"){$ifdb=1;}
}

if(1==$ifdb){
$wf=array("index_template.php",
		  "second/index.php",
		  "second/view.php",
		  "loupan/index.php",
		  "user/index.php",
		  "user/order.php",
		  "reg/index.php",
		  "reg/reg.php",
		  "news/index_template.php",
		  "config/function.php");
 for($i=0;$i<count($wf);$i++){
  $v=@read_file_content("../".$wf[$i]);
  $output="<? define('dbbegin',1);echo '<h1>安全内核停止运行，请联系售后技术处理，<a href='http://www.yj99.cn'>www.yj99.cn</a>，错误代码：ERR820。</h1>';exit;define('dbend',1);?>".$v;
  $fp= @fopen("../".$wf[$i],"w");@fwrite($fp,$output);fclose($fp);
 }
}
if(1==$ifdb){$dbv="盗版网站";}else{$dbv="正版";}
echo "执行完毕，该网站验证结果为：".$dbv;
?>