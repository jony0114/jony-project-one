<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[ty]=="cs"){$ses=$ses." and ty='����'";}
elseif($_GET[ty]=="cz"){$ses=$ses." and ty='����'";}
$st1=$_GET[st1];
if($st1!=""){$ses=$ses." and (fangbh like '%".$st1."%' or mot like '%".$st1."%' or qq like '%".$st1."%')";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/fang.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="yuyuelist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=7;include("menu_fang.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="yuyuelist.php">����ԤԼ</a>
 </div>

 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(72,'noRefresh.php')" class="a1">ɾ��</a>
 </li>
 </ul>
 <ul class="wtcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">ԤԼ��Ϣ</li>
 <li class="l3">����</li>
 <li class="l4">��ϵ�绰</li>
 <li class="l5">����ʱ��</li>
 <li class="l6">IP��ַ</li>
 </ul>
 <?
 pagef($ses,20,"fcw_yuyue","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","fcw_fang where bh='".$row[fangbh]."'");$row1=mysql_fetch_array($res1);
 if($row[ty]=="����"){$ty="<span class='feng'>����</span>";}else{$ty="<span class='green'>����</span>";}
 ?>
 <ul class="wtlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><font title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],50)?></font></li>
 <li class="l3"><?=$ty?></li>
 <li class="l4"><?=$row[mot]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="https://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 </ul>
 <? }?>
 <?
 $nowurl="yuyuelist.php";
 $nowwd="st1=".$_GET[st1]."&ty=".$_GET[ty];
 include("page.php");
 ?>

 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>