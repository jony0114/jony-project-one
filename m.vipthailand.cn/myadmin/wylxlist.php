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
<script language="javascript">
function del(x){
document.getElementById("chk"+x).checked=true;
checkDEL(11,'fcw_wylx')
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
 <? $leftid=2;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="wylxlist.php">��ҵ����</a>
 </div>

 <div class="rights">
 &nbsp;<strong>��ʾ��</strong><br>
 &nbsp;1��ԭʼ����ǰ��<span class="red">[*]</span>��Ϊϵͳ�Դ���ҵ���ͣ�����ɾ����ֻ�ɸ���������<br>
 &nbsp;2����������ҵ���ͣ����û�¼������ʱ��ֻ����һЩͨ�õ�����(��۸������)
 </div>

 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="wylx.php" class="a1">��������</a>
 <a href="javascript:void(0)" onclick="checkDEL(11,'fcw_wylx')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="wylxlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">����ԭʼ����</li>
 <li class="l3">չʾ����</li>
 <li class="l4">���</li>
 <li class="l5">�Ƿ�����</li>
 <li class="l6">����</li>
 </ul>
 <?
 while1("*","fcw_wylx order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="wylx.php?action=update&id=".$row1[id];
 if($row1[ifuse]=="on"){$qy="<span class='blue'>����</span>";}
 elseif($row1[ifuse]=="off"){$qy="<span class='red'>�ѽ���</span>";}
 $ifs="";if(1==$row1[ifsys]){$ifs="<span class='red'>*</span> ";}
 ?>
 <ul class="wylxlist">
 <li class="l1"><? if(0==$row1[ifsys]){?><input name="C1" type="checkbox" value="<?=$row1[id]?>" /><? }?></li>
 <li class="l2" onclick="gourl('<?=$nu?>')"><?=$ifs.$row1[name1]?></li>
 <li class="l3" onclick="gourl('<?=$nu?>')"><?=$row1[name2]?></li>
 <li class="l4"><?=$row1[xh]?></li>
 <li class="l5"><?=$qy?></li>
 <li class="l6"><a href="<?=$nu?>">�༭</a></li>
 </ul>
 <? }?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>