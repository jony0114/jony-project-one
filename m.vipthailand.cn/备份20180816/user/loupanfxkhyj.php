<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];

while0("*","fcw_loupanfxkh where bh='".$bh."' and (uid1='".$_SESSION[FCWuser]."' or uid2='".$_SESSION[FCWuser]."' or uid3='".$_SESSION[FCWuser]."')");if(!$row=mysql_fetch_array($res)){Audit_alert("��Ȩ�޽��д˲�����","loupanfxkhlist.php");}
if($row[uid1]==$_SESSION[FCWuser]){$khsf=1;} //1��ʾ¼����
if($row[uid2]==$_SESSION[FCWuser]){$khsf=2;} //2��ʾ����������
if($row[uid3]==$_SESSION[FCWuser]){$khsf=3;} //3��ʾ��������
while1("*","fcw_xq where bh='".$row[xqbh]."'");$row1=mysql_fetch_array($res1);

if($_GET[control]=="update" && $khsf==3 && $row[jd]==2){
 if(0==$row[ifmoney]){
  if(1==$row1[fxty]){
   $yj1=$row[money1]*$row1[fxmoney3];
   $yj2=$row[money1]*$row1[fxmoney2];
   $yj3=$row[money1]*$row1[fxmoney1];
  }else{
   $yj1=$row1[fxmoney3];
   $yj2=$row1[fxmoney2];
   $yj3=$row1[fxmoney1];
  }
 PointIntoM($row[uid1],"¥�̷����ɵ�,���¼����Ӷ��",$yj1);PointUpdateM($row[uid1],$yj1); 
 PointIntoM($row[uid2],"¥�̷����ɵ�,��ø���������Ӷ��",$yj2);PointUpdateM($row[uid2],$yj2); 
 PointIntoM($row[uid3],"¥�̷����ɵ�,�����Ŀ����Ӷ��",$yj3);PointUpdateM($row[uid3],$yj3); 
 updatetable("fcw_loupanfxkh","yj1=".$yj1.",yj2=".$yj2.",yj3=".$yj3.",ifmoney=1 where bh='".$bh."' and uid3='".$_SESSION[FCWuser]."'");
 }
php_toheader("loupanfxkhyj.php?t=suc&bh=".$bh); 
}
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
<script language="javascript">
function yjtj(){
 if(confirm("ȷ��Ҫ����Ӷ����һ�����ţ������޸�")){location.href="loupanfxkhyj.php?bh=<?=$bh?>&control=update";}else{return false;}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > <a href="loupanfxkhlist.php">¥�̷����ͻ�����</a> > Ӷ����</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap12.php");?>
 <script language="javascript">
 $("rcap3").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","loupanfxkhyj.php?bh=".$bh)?>
 
 <div class="lpfxyj">
  <ul class="u1">
  <li class="l1"><?=$row1[xq]?></li>
  <li class="l2"><a href="../loupan/view<?=$row1[id]?>.html" target="_blank"><img width="170" height="113" src="../upload/<?=returnuserid($row1[uid])?>/f/<?=$row1[bh]?>/home.jpg" /></a></li><li class="l3">��������<?=returnarea(1,$row1[areaid]).returnarea(2,$row1[areaids])?></li>
  <li class="l4">¥�̾��ۣ�<?=returnjgdw($row1[money1],"Ԫ/ƽ��","��δ����")?></li>
  </ul>
  <ul class="u2">
  <li class="l1">
  ��ϲ�����ɵ��ˣ��ɵ����Ϊ��<?=$row[money1]?>Ԫ ^_^<br>
  ���ݸ���Ŀ��Ӷ����򣬷��ŵ�Ӷ��������£�
  </li>
  
  <? if(0==$row[ifmoney]){?>
  <li class="l1">
  <strong> 
  1��¼����(<?=returnuname($row[uid1])?>)Ӷ��<? if(1==$row1[fxty]){echo $row[money1]*$row1[fxmoney3];}else{echo $row1[fxmoney3];}?>Ԫ<br>
  2������������(<?=returnuname($row[uid2])?>)Ӷ��<? if(1==$row1[fxty]){echo $row[money1]*$row1[fxmoney2];}else{echo $row1[fxmoney2];}?>Ԫ<br>
  3����Ŀ����(<?=returnuname($row[uid3])?>)Ӷ��<? if(1==$row1[fxty]){echo $row[money1]*$row1[fxmoney1];}else{echo $row1[fxmoney1];}?>Ԫ<br>
  </strong>
  </li>
  <? if($khsf==3){?><li class="l2"><a href="javascript:void(0);" onclick="yjtj()" class="ffbtn">�˶�����,����</a></li><? }?>
  
  <? }else{?>
  <li class="l1">
  <strong> 
  1��¼����(<?=returnuname($row[uid1])?>)Ӷ��<?=$row[yj1]?>Ԫ<br>
  2������������(<?=returnuname($row[uid2])?>)Ӷ��<?=$row[yj2]?>Ԫ<br>
  3����Ŀ����(<?=returnuname($row[uid3])?>)Ӷ��<?=$row[yj3]?>Ԫ<br>
  </strong>
  </li>
  <? }?>
  
  </ul>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>