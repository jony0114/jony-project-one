<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[yjcode])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_control")==0){intotable("code_control","webnamev","'����ʧ��'");}
 $wxlogin=sqlzhuru($_POST[wx1]).",".sqlzhuru($_POST[wx2]);
 updatetable("fcw_control","
			  mailname='".sqlzhuru($_POST[m1])."',
			  mailsmtp='".sqlzhuru($_POST[m3])."',
			  mailpwd='".sqlzhuru($_POST[m2])."',
			  maildk='".sqlzhuru($_POST[m4])."',
			  qqappid='".sqlzhuru($_POST[q1])."',
			  qqappkey='".sqlzhuru($_POST[q2])."',
			  smsfun='".sqlzhuru($_POST[s1])."',
			  smsmode=".sqlzhuru($_POST[Rsmsmode]).",
			  wxlogin='".$wxlogin."'
			  ");
 
 $hd=weburl."reg/qqreturnlast.php";
 $output="{\"appid\":\"".sqlzhuru($_POST[q1])."\",\"appkey\":\"".sqlzhuru($_POST[q2])."\",\"callback\":\"".$hd."\",\"scope\":\"get_user_info\",\"errorReport\":true,\"storageType\":\"file\",\"host\":\"localhost\",\"user\":\"root\",\"password\":\"root\",\"database\":\"test\"}";
 $fp= fopen("../config/qq/API/comm/inc.php","w");
 fwrite($fp,$output);
 fclose($fp);
 
  if(intval($_POST[Rsmsmode])==1 || intval($_POST[Rsmsmode])==2){}else{
  while1("*","yjcode_control");$row1=mysql_fetch_array($res1);
  $output="<? ".$t.$row1[smsfun]."?>";
  $fp= fopen("../config/mobphp/mysendsms.php","w");
  fwrite($fp,$output);
  fclose($fp);
 }
 
 $mb=array("001","002","003","004","005","006");for($i=0;$i<count($mb);$i++){
 $mbid=$_POST["tmb".$mb[$i]];
 updatetable("fcw_smsmb","mbid='".$mbid."' where mybh='".$mb[$i]."'");
 }
 
 php_toheader("inf2.php?t=suc");
}

while0("*","fcw_control");$row=mysql_fetch_array($res);
$wxlogin=array("","");
if(!empty($row[wxlogin]) && $row[wxlogin]!=","){$wxlogin=preg_split("/,/",$row[wxlogin]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf2.php";
}
function smsmdcha(x){
if(0==x){document.getElementById("smsmd1").style.display="none";document.getElementById("smsmd0").style.display="";}else{document.getElementById("smsmd1").style.display="";document.getElementById("smsmd0").style.display="none";}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>
<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit3").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf2.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="rcap"><li class="l1"></li><li class="l2">�ʾ�����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">���������ʺţ�</li>
 <li class="l2"><input name="m1" value="<?=$row[mailname];?>" size="20" type="text" class="inp" /></li>
 <li class="l1">�������룺</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[mailpwd];}?>
 <input name="m2" value="<?=$sv?>" size="20" type="text" class="inp" />
 </li>
 <li class="l1">����SMTP��</li>
 <li class="l2"><input name="m3" value="<?=$row[mailsmtp]?>" size="20" type="text" class="inp" /></li>
 <li class="l1">����˿ڣ�</li>
 <li class="l2"><input name="m4" value="<?=$row[maildk]?>" size="20" type="text" class="inp" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">QQ�ӿ�</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">APP ID��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[qqappid];}?>
 <input name="q1" value="<?=$sv?>" size="20" type="text" class="inp" />
 </li>
 <li class="l1">APP KEY��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[qqappkey];}?>
 <input name="q2" value="<?=$sv?>" size="40" type="text" class="inp" />
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">�ֻ����Žӿ�</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">���ŷ���ģʽ��</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rsmsmode" onclick="smsmdcha(0)" type="radio" value="0" <? if(empty($row[smsmode])){?> checked="checked"<? }?> />ֱ�ӷ���ģʽ�������й��������֣�</label>&nbsp;&nbsp;
 <label><input name="Rsmsmode" onclick="smsmdcha(1)" type="radio" value="1" <? if($row[smsmode]==1){?> checked="checked"<? }?> />ģ�巢����ʽ��������ڣ�<a href="http://www.yj99.cn/faq/view93.html" target="_blank" class="red">�鿴����˵��</a></label>&nbsp;&nbsp;
 <label><input name="Rsmsmode" onclick="smsmdcha(2)" type="radio" value="2" <? if($row[smsmode]==2){?> checked="checked"<? }?> />ģ�巢����ʽ������ͨ�ţ�<a href="http://www.yj99.cn/faq/view93.html" target="_blank" class="red">����˵��</a></label>
 </span>
 </li>
 </ul>

 <ul class="uk uk0" id="smsmd0" style="display:none;">
 <li class="l4">��������</li>
 <li class="l5">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[smsfun];}?>
 <textarea name="s1"><?=$sv?></textarea>
 </li>
 </ul>
 
 <ul class="uk uk0" id="smsmd1" style="display:none;">
 <? 
 $nbh="001";
 $t="��֤�룺\${yzm}�������ڽ����ֻ���֤��������Ǳ��˲���������Դ���Ϣ��";
 while1("*","fcw_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("fcw_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">����ģ��ID1��</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="20" type="text" class="inp" />
 <span class="fd"><?=$t?></span>
 </li>
 <? 
 $nbh="002";
 $t="��֤�룺\${yzm}��������ʹ���ֻ�������ٵ�¼��������Ǳ��˲���������Դ���Ϣ��";
 while1("*","fcw_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("fcw_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">����ģ��ID2��</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="20" type="text" class="inp" />
 <span class="fd"><?=$t?></span>
 </li>
 <? 
 $nbh="003";
 $t="��֤�룺\${yzm}���������һ����룬������Ǳ��˲���������Դ���Ϣ��";
 while1("*","fcw_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("fcw_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">����ģ��ID3��</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="20" type="text" class="inp" />
 <span class="fd"><?=$t?></span>
 </li>
 <? 
 $nbh="004";
 $t="��֤�룺\${yzm}�������ڽ����ֻ��󶨣�������Ǳ��˲���������Դ���Ϣ��";
 while1("*","fcw_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("fcw_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">����ģ��ID4��</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="20" type="text" class="inp" />
 <span class="fd"><?=$t?></span>
 </li>
 <? 
 $nbh="005";
 $t="��֤�룺\${yzm}�������ڽ����ֻ�����󶨣�������Ǳ��˲���������Դ���Ϣ��";
 while1("*","fcw_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("fcw_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">����ģ��ID5��</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="20" type="text" class="inp" />
 <span class="fd"><?=$t?></span>
 </li>
 <? 
 $nbh="006";
 $t="��֤�룺\${yzm}�������ڽ���ί�з�������Ǳ��˲���������Ա���Ϣ��";
 while1("*","fcw_smsmb where mybh='".$nbh."'");if($row1=mysql_fetch_array($res1)){$mbid=$row1[mbid];$txt=$row[txt];}else{
 intotable("fcw_smsmb","mybh,txt,mbid","'".$nbh."','".$t."',''");$txt=$t;$mbid="";
 }
 ?>
 <li class="l1">����ģ��ID6��</li>
 <li class="l2">
 <input name="tmb<?=$nbh?>" value="<?=$mbid?>" size="20" type="text" class="inp" />
 <span class="fd"><?=$t?></span>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">΢�Žӿ�</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">AppID��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxlogin[0];}?>
 <input name="wx1" value="<?=$sv?>" size="20" type="text" class="inp" />
 <span class="fd"><a href="http://www.yj99.cn/faq/view105.html" class="red" target="_blank">[�鿴�̳�]</a></span>
 </li>
 <li class="l1">AppSecret��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxlogin[1];}?>
 <input name="wx2" value="<?=$sv?>" size="40" type="text" class="inp" />
 </li>
 </ul>

 <ul class="uk">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<?php include("bottom.php");?>
<script language="javascript">smsmdcha(<?=returnjgdw($rowcontrol[smsmode],"",0)?>);</script>
</body>
</html>