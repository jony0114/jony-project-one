<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[st1]!=""){$ses=$ses." and (uname like '%".$_GET[st1]."%' or uid like '%".$_GET[st1]."%' or nc like '%".$_GET[st1]."%' or company like '%".$_GET[st1]."%')";}
if($_GET[ut]!=""){$ses=$ses." and usertype=".$_GET[ut];}
if($_GET[rz]!=""){$ses=$ses." and (sfzrz=0 or yyzzrz=0)";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/user.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="userlist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_user.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="userlist.php">��Ա����</a>
 </div>

 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="red">ɾ����Ա��ɾ���û�Ա����������Ϣ���Ҳ��ɻָ���������</span>
 </div>

 <!--B-->
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(40,'fcw_user')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="userlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��Ա�ʺ�</li>
 <li class="l3">ע������</li>
 <li class="l4">��Ա�ǳ�</li>
 <li class="l5">���</li>
 <li class="l6">ʱ��</li>
 <li class="l7">IP</li>
 <li class="l8">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_user","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="user".$row[usertype].".php?id=".$row[id];
 ?>
 <ul class="userlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><a class="blue" href="<?=$aurl?>"><?=$row[uid]?></a></li>
 <li class="l3"><?=returnuty($row[usertype])?></li>
 <li class="l4"><?=$row[nc]?></li>
 <li class="l5"><?=$row[money1]?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l7"><a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 <li class="l8">
 <a href="<?=$aurl?>">�༭</a><span></span>
 <a href="user_ses.php?uid=<?=$row[uid]?>&uty=<?=$row[usertype]?>" target="_blank">��̨</a><span></span>
 <a href="userrz<?=$row[usertype]?>.php?id=<?=$row[id]?>">��֤</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="userlist.php";
 $nowwd="st1=".$_GET[st1]."&ut=".$_GET[ut]."&rz=".$_GET[rz];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>