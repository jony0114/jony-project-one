<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="jiajctypelist.php">�Ҿӽ��ķ���</a>
 </div>
 
 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="jiajctype1.php" class="a1">��������</a>
 <a href="javascript:void(0)" onclick="checkDEL(56,'fcw_jia_jctype')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">���Ĵ����</li>
 <li class="l3">���</li>
 <li class="l4">�༭ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <?
 while1("*","fcw_jia_jctype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="jiajctype1.php?action=update&id=".$row1[id];
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>" /></li>
 <li class="l2"><a href="jiajclists.php?ty1id=<?=$row1[id]?>"><?=$row1[type1]?></a></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5">
 <a href="jiajctype2.php?ty1id=<?=$row1[id]?>">�������</a><span></span>
 <a href="<?=$nu?>">�༭</a></li>
 </ul>
 <? }?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>