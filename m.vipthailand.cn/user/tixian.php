<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[txyh]) || empty($rowuser[txname]) || empty($rowuser[txzh])){Audit_alert("��δ�����տ��ʺţ���������","txsz.php");}

if(sqlzhuru($_POST[jvs])=="tixian"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $money1=sqlzhuru($_POST[t1]);
 if(!eregi("^[0-9,\.]+$",$money1)){Audit_alert("���ֽ���ȷ","tixian.php");}
 $m=(float)$money1;
 if($m>$rowuser[money1] || $m<=0){Audit_alert("���ֽ���ȷ������ʧ��","tixian.php");}
 $bh=time()."tx".$rowuser[id];
 intotable("fcw_tixian","bh,uid,money1,sj,uip,txyh,txname,txzh,txkhh,zt,sm","'".$bh."','".$_SESSION[FCWuser]."',".$m.",'".$sj."','".$uip."','".$rowuser[txyh]."','".$rowuser[txname]."','".$rowuser[txzh]."','".$rowuser[txkhh]."',4,''");
  PointUpdateM($_SESSION[FCWuser],$m*(-1));
  PointIntoM($_SESSION[FCWuser],"��������",$m*(-1));
  php_toheader("tixian.php?t=suc");
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
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){alert("��������Ч�����ֽ��");document.f1.t1.focus();return false;}	
if(confirm("ȷ��Ҫ������")){tjwait();f1.action="tixian.php";}else{return false;}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ҫ����</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap4").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ������ǻᾡ�촦��������������!","tixian.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="tixian" name="jvs" />
 <ul class="uk">
 <li class="l1">������ʾ��</li>
 <li class="l21">������������µ��տ��ʺ��տ�����ԡ�<a href="txsz.php" class="feng">�޸��տ��ʺ���Ϣ</a>��</li>
 <li class="l1">������</li>
 <li class="l21 red"><strong style="font-family:Arial, Helvetica, sans-serif;font-size:16px;">��<?=$rowuser[money1]?></strong></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>���ֽ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">�������ͣ�</li>
 <li class="l21"><?=$rowuser[txyh]?></li>
 <li class="l1">����/�˺ţ�</li>
 <li class="l21"><?=$rowuser[txzh]?></li>
 <li class="l1"<? if($rowuser[txyh]=="֧����" || $rowuser[txyh]=="�Ƹ�ͨ"){?> style="display:none;"<? }?>>�����У�</li>
 <li class="l21"<? if($rowuser[txyh]=="֧����" || $rowuser[txyh]=="�Ƹ�ͨ"){?> style="display:none;"<? }?>><?=$rowuser[txkhh]?></li>
 <li class="l1">������</li>
 <li class="l21"><?=$rowuser[txname]?></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("��һ��")?></li>
 </ul>
 </form>
 
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>