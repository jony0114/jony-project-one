<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/jia.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=4;include("menu_jia.php");?>

<div class="right">

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">װ���б�</a>
 </div> 

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(54,'fcw_jia_zb')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="jialcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">װ���б���Ϣ</li>
 <li class="l3">�ɷ�״̬</li>
 <li class="l4">Ԥ��</li>
 <li class="l5">����ʱ��</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_jia_zb","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="zb.php?action=update&id=".$row[id];
 if(1==$row[zt]){$ztv="<span class='red'>�ȴ��ɷ�</span>";}else{$ztv="<span class='blue'>���ɷ�</span>";}
 ?>
 <ul class="jial">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=$row["lxr"]." �ֻ���".$row[mot]?></a></li>
 <li class="l3"><?=$ztv?></li>
 <li class="l4"><?=$row[ys]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">����</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="zblist.php";
 $nowwd="zt=".$_GET[zt];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>