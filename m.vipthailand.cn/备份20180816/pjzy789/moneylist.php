<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[st1]!=""){$ses=$ses." and uid='".$_GET[st1]."'";}
if($_GET[st2]!=""){$ses=$ses." and tit like '%".$_GET[st2]."%'";}
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
location.href="moneylist.php?st1="+document.getElementById("st1").value+"&st2="+document.getElementById("st2").value;	
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
 <? $leftid=2;include("menu_user.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="userlist.php">��Ա����</a>
 </div>

 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="red">��ɾ��ÿ����¼��ɾ���󣬿��ܵ��»�Ա�Ķ��ʼ�¼��ͬ�����������漰��������</span>
 </div>
 <!--B-->
 <ul class="psel">
 <li class="l1">��Ա�ʺţ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st2]?>" type="text" id="st2" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(75,'fcw_moneyrecord')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="moneylistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">˵��</li>
 <li class="l3">�ʽ�</li>
 <li class="l4">����IP</li>
 <li class="l5">����ʱ��</li>
 <li class="l6">��Ա</li>
 </ul>
 <? pagef($ses,20,"fcw_moneyrecord","order by sj desc");while($row=mysql_fetch_array($res)){?>
 <ul class="moneylist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><?=$row[tit]?></li>
 <li class="l3"><? if($row[moneynum]>0){?><span class="blue"><?=$row[moneynum]?></span><? }else{?><span class="red"><?=$row[moneynum]?></span><? }?></li>
 <li class="l4"><a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><?=$row[uid]?></li>
 </ul>
 <? }?>
 <?
 $nowurl="moneylist.php";
 $nowwd="st1=".$_GET[st1]."&st2=".$_GET[st2];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>