<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
while0("*","fcw_user where uid='".$_SESSION[FCWuser]."'");if(!$row=mysql_fetch_array($res)){php_toheader("un.php");}
if(1==$row[usertype] || 2==$row[usertype] || 7==$row[usertype]){
 $usertx="../upload/".$row[id]."/user.jpg";
 $txurl="touxiang.php";
}elseif(3==$row[usertype] || 4==$row[usertype] || 5==$row[usertype] || 6==$row[usertype]){
 $usertx="../upload/".$row[id]."/shop.jpg";
 $txurl="inf".$row[usertype].".php";
}
if(!is_file($usertx)){$usertx="img/nonetx.gif";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a></li>
</ul>
<? include("left.php");?>

<!--RB-->
<div class="iright">
 <!--����B-->
 <div class="jb">
 <ul class="ircap">
 <li class="l1">�ҵĻ�����Ϣ</li>
 </ul>
 <div class="tx"><a href="<?=$txurl?>"><img border="0" src="<?=$usertx?>" width="100" height="100" /></a><br>[<a href="<?=$txurl?>">����ͼƬ</a>]</div>
 <ul class="u1">
 <li class="l1">
 ��ӭ����<strong class="blue"><?=$row[nc]?></strong>
 <? if($_SESSION[FCWuserID]==1 || $_SESSION[FCWuserID]==2 || $_SESSION[FCWuserID]==4){?>��<a href="userdj.php" class="feng"><?=returndjname(returnuserdj($luserid))?></a>��<? }?>
 </li>
 <li class="l2">��֤��</li>
 <li class="l3">
 <a href="smrz<?=$_SESSION[FCWuserID]?>.php"><? if(1==$row[sfzrz]){?><img src="img/xc1.gif" title="��ͨ��ʵ����֤" /><? }else{?><img src="img/xc0.gif" title="δͨ��ʵ����֤" /><? }?></a>
 <a href="mobbd.php"><? if(1==$row[ifmot]){?><img src="img/sj1.gif" title="�ֻ���ͨ����֤" /><? }else{?><img src="img/sj0.gif" title="�ֻ�δ��֤" /><? }?></a>
 <a href="emailbd.php"><? if(1==$row[ifemail]){?><img src="img/yx1.gif" title="������ͨ����֤" /><? }else{?><img src="img/yx0.gif" title="����δ��֤" /><? }?></a>
 </li>
 <li class="l1">
 �ϴε�¼ʱ�䣺<?
 while1("*","fcw_loginlog where uid='".$row[uid]."' and admin=1 order by id desc limit 2");$row1=mysql_fetch_array($res1);$psj=$row1[sj];$puip=$row1[uip];
 if($row1=mysql_fetch_array($res1)){$psj=$row1[sj];$puip=$row1[uip];}
 ?>
 <?=$psj?> <a href="http://www.baidu.com/s?wd=<?=$puip?>" title="<?=$puip?>" target="_blank">[�鿴��ַ]</a>
 </li>
 </ul>
 <ul class="u2">
 <li class="l1">�������<br><strong>��<?=$row[money1]?></strong></li>
 <li class="l2"><input type="button" value="��ֵ" onclick="gourl('pay.php')" /></li>
 </ul>
 </div>
 <!--����E-->
 
 <!--����B-->
 
 <!--����E-->
 
 <!--��ʾB-->
 <div class="rzts">
 <ul class="ircap">
 <li class="l1">��ȫ����</li>
 </ul>
 <? if(1==$row[sfzrz]){$a="ok";}else{$a="err";}?>
 <ul class="u1">
 <li class="l1 <?=$a?>">ʵ����֤</li>
 <li class="l2">ͨ��ʵ����֤������������Ϊ���ṩ���õķ���</li>
 <li class="l3"><a href="smrz<?=$_SESSION[FCWuserID]?>.php">�鿴</a></li>
 </ul>
 
 <? if(1==$row[ifmot]){$a="ok";}else{$a="err";}?>
 <ul class="u1">
 <li class="l1 <?=$a?>">�ֻ���</li>
 <li class="l2">�������ֻ�������ע��ʱ���ʺ��ϣ�����ʻ����ʽ�ȫ��</li>
 <li class="l3"><a href="mobbd.php">�鿴</a></li>
 </ul>
 
 <? if(empty($row[txyh]) || empty($row[txname]) || empty($row[txzh])){$a="err";}else{$a="ok";}?>
 <ul class="u1">
 <li class="l1 <?=$a?>">�տ��ʺ�����</li>
 <li class="l2">���ڱ�վ���ʽ�����ʱ�����ǽ�ͨ������տ��ʺŻ�����</li>
 <li class="l3"><a href="txsz.php">�鿴</a></li>
 </ul>
 
 <? if(1==$row[ifemail]){$a="ok";}else{$a="err";}?>
 <ul class="u1">
 <li class="l1 <?=$a?>">���������</li>
 <li class="l2">�������ǵ�¼����ʱ������ͨ�������һ�����</li>
 <li class="l3"><a href="emailbd.php">�鿴</a></li>
 </ul>
  
 <? if(strcmp(sha1("admin"),$row[pwd])==0 || strcmp(sha1("123456"),$row[pwd])==0 || strcmp(sha1("admin888"),$row[pwd])==0){$a="err";}else{$a="ok";}?>
 <ul class="u1">
 <li class="l1 <?=$a?>">��¼����</li>
 <li class="l2">Ӣ�ļ����ֻ���ŵ�������룬��ȫ�Ը��ߣ����鶨�ڸ�������</li>
 <li class="l3"><a href="pwd.php">�鿴</a></li>
 </ul>
 
 <? if(1!=$rowcontrol[regqq]){?>
 <? if(1==$row[ifqq]){$a="ok";}else{$a="err";}?>
 <ul class="u1">
 <li class="l1 <?=$a?>">QQ��</li>
 <li class="l2">��QQ���Ժ������QQһ����¼�������������ʺ�����</li>
 <li class="l3"><a href="qq.php">�鿴</a></li>
 </ul>
 <? }?>
  
 <? if(!empty($row[qq]) && !empty($row[nc])){$a="ok";}else{$a="err";}?>
 <ul class="u1 u0">
 <li class="l1 <?=$a?>">��ϵ��ʽ</li>
 <li class="l2">�����������ĸ��˻������ϣ����������Ǹ���Ϊ���ṩ����</li>
 <li class="l3"><a href="inf<?=$_SESSION[FCWuserID]?>.php">�鿴</a></li>
 </ul>
 </div>
 <!--��ʾE-->

</div> 
<!--RE-->

<!--RRB-->
<div class="icb">
 <div class="kf">
 <ul class="icbcap">
 <li class="l1">��վ�ͷ�����</li>
 <li class="l2"></li>
 </ul>
 <ul class="u1">
 <li class="l1">�ͷ�QQ:</li>
 <li class="l2">
 <?
 $qq=preg_split("/,/",$rowcontrol[webqq]);
 for($qqi=0;$qqi<count($qq);$qqi++){
 $qv=preg_split("/\*/",$qq[$qqi]);
 if($qv[0]!=""){
 if($qv[1]==""){$qtit="��վ�ͷ�";}else{$qtit=$qv[1];}
 ?>
 <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
 <?
 }
 }
 ?>
 </li>
 <li class="l1">�绰��<?=webtel?></li>
 </ul>
 </div>
 
 <div class="icbad">
 <? adwhile("ADU01");?>
 </div>
</div>
<!--RRE-->

</div>

<? include("../template/bottom.html");?>
</body>
</html>