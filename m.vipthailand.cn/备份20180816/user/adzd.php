<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
//��֤��B
$ty=$_GET[ty];
$bh=$_GET[bh];
if($ty=="chushou"){$tyv="����";}
elseif($ty=="chuzu"){$tyv="����";}
elseif($ty=="qiugou"){$tyv="��";}
elseif($ty=="qiuzu"){$tyv="����";}

if($ty=="chushou" || $ty=="chuzu" || $ty=="qiugou" || $ty=="qiuzu"){
 $ses="fcw_fang where type1='".$tyv."' and zt=0 and bh='".$bh."' and (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."')";
 $zdarr=",";
 while2("*","fcw_fang where type1='".$tyv."' and zdxh>0");while($row2=mysql_fetch_array($res2)){
  if(strtotime($row2[zddq])<=strtotime($sj)){updatetable("fcw_fang","zdxh=0 where id=".$row2[id]);}else{
  $zdarr=$zdarr.$row2[zdxh].",";
  }
 }

}
while0("*",$ses);if(!$row=mysql_fetch_array($res)){php_toheader("./");}
//��֤��E

while3("uid,money1","fcw_user where uid='".$_SESSION[FCWuser]."'");$row3=mysql_fetch_array($res3);

//ִ��B
if($_GET[control]=="update"){
 $xh=$_GET[xh];
 if(!is_numeric($xh)){Audit_alert("������֤���󣬷������ԣ�","./");}
 
 if($ty=="chushou" || $ty=="chuzu" || $ty=="qiugou" || $ty=="qiuzu"){
 while1("*","fcw_fang where zdxh=".$xh." and type1='".$tyv."'");
 }
 
 $row1=mysql_fetch_array($res1);
 if(strtotime($row1[zddq])>strtotime($sj)){Audit_alert("�޷����򣬿��ܸ�λ���Ѿ����������ˣ��������ԣ�","./");}
 while1("*","fcw_adzd where type1='".$ty."' and xh=".$xh);if(!$row1=mysql_fetch_array($res1)){Audit_alert("�ö�λ�����ڣ��������ԣ�","./");}
 $amoney=$row1[money1]*intval($_POST[t1]);
 if($row3[money1]<$amoney){Audit_alert("���㣬���ȳ�ֵ��","pay.php?m=".($amoney-$row3[money1]));}
 $dqsj=date("Y-m-d H:i:s",strtotime("+".$_POST[t1]." day"));
 
 if($ty=="chushou" || $ty=="chuzu" || $ty=="qiugou" || $ty=="qiuzu"){
 updatetable("fcw_fang","zddq='".$dqsj."',zdxh=".$xh." where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."'");
 }
 
 PointIntoM($_SESSION[FCWuser],"�����ö�λ",$amoney*(-1));
 PointUpdateM($_SESSION[FCWuser],$amoney*(-1)); 

 php_toheader($ty."list.php");
 
}
//ִ��E

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
<script language="javascript">
var ndj=0;
var nxh=0;
function asel(x,y){
 ndj=y;
 nxh=x;
 ax=parseInt(document.getElementById("allxh").innerHTML);
 for(i=1;i<=ax;i++){
 if(document.getElementById("axh"+i)){document.getElementById("axh"+i).className="s3";}
 }
 document.getElementById("axh"+x).className="s3 s32";
 mtj();
}
function mtj(){
document.getElementById("allmoney").innerHTML=0;
if(!isNaN(document.f1.t1.value)){document.getElementById("allmoney").innerHTML=accMul(document.f1.t1.value,ndj);}
}
function tj(){
 if(0==nxh){alert("����ѡ��һ���ö�λ��");return false;}
 if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){alert("�����빺��������");document.f1.t1.focus();return false;}
 if(confirm("����ɹ��󣬷��ý�ֱ�Ӵ���������п۳���ȷ�Ϲ�����?")){}else{return false;}
 tjwait();
 f1.action="adzd.php?control=update&bh=<?=$bh?>&ty=<?=$ty?>&xh="+nxh;
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �����ö�λ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

   <form name="f1" method="post" onsubmit="return tj()">
   <ul class="ukad" style="margin:10px 0 0 0;">
   <li class="l1">ѡ���ö�λ��</li>
   <li class="l2">
   <?
   $i=0;
   while1("*","fcw_adzd where type1='".$ty."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $i++;
   ?>
   <a <? if(!strstr($zdarr,",".$row1[xh].",")){?> id="axh<?=$row1[xh]?>" class="s3" href="javascript:asel(<?=$row1[xh]?>,<?=$row1[money1]?>)"<? }else{?>class="s3 s31" href="javascript:void(0);"<? }?>><b>λ��<?=$row1[xh]?></b><br><strong><?=$row1[money1]?></strong>Ԫ/��</a>
   <? }?>
   </li>
   </ul>
   <span id="allxh" style="display:none"><?=$i?></span>
   
   <ul class="uk">
   <li class="l1">����������</li>
   <li class="l2"><input name="t1" onchange="mtj()" autocomplete="off" disableautocomplete onkeyup="value=value.replace(/[^\d]/g,'');mtj();" class="inp" type="text" /></li>
   <li class="l1">�ܼƷ��ã�</li>
   <li class="l21"><strong class="red"><span id="allmoney">0</span></strong>Ԫ</li>
   <li class="l1">������</li>
   <li class="l21"><?=$row3[money1]?>Ԫ  [<a href="pay.php">��ֵ</a>]</li>
   <li class="l3"></li>
   <li class="l4"><? tjbtnr("�ύ����")?></li>
   </ul>
   </form>


</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>