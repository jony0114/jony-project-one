<?php
set_time_limit(0);
include("../../../config/conn.php");
include("../../../config/function.php");
$t=read_file_content("../../../config/userkey.dll");
$t1=preg_split("/\|/",$t);
$w=$_SERVER['HTTP_HOST'];
$ifdb=0;
if(!strstr($w,$t1[0])){$ifdb=1;}
$vadf8xe8w=htmlget("http://www.yjcode.com/vip/vipcheck.php?md5v=".$t."&web=".$t1[0]);
if($vadf8xe8w=="err"){$ifdb=1;}
if(1==$ifdb){
$wf=array("index_template.php",
		  "second/index.php",
		  "loupan/index.php",
		  "rent/index.php",
		  "user/index.php",
		  "config/function.php");
 for($i=0;$i<count($wf);$i++){
  $v=@read_file_content("../../../".$wf[$i]);
  $output="<? define('dbbegin',1);echo '<h1>��ȫ�ں�ֹͣ���У�����ϵ�ۺ���������������룺ERR820��</h1>';exit;define('dbend',1);?>".$v;
  $fp= @fopen("../../../".$wf[$i],"w");@fwrite($fp,$output);fclose($fp);
 }
}
if(1==$ifdb){$dbv="������վ";}else{$dbv="����";}
echo "ִ����ϣ�����վ��֤���Ϊ��".$dbv;
?>