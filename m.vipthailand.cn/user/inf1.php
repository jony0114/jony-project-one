<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(1!=$_SESSION[FCWuserID]){Audit_alert("�����·����Դ��","inf".$_SESSION[FCWuserID].".php");}

if(sqlzhuru($_POST[jvs])=="inf"){
 zwzr();
 updatetable("fcw_user","nc='".sqlzhuru($_POST[tnc])."',qq='".sqlzhuru($_POST[tqq])."',utel='".sqlzhuru($_POST[tutel])."',areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where uid='".$_SESSION[FCWuser]."'");
 php_toheader("inf1.php?t=suc"); 
}

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

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
 if((document.f1.tnc.value).replace("/\s/","")==""){alert("�������ǳ�");document.f1.tnc.focus();return false;}
 tjwait();
 f1.action="inf1.php";
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ���˻�������</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","inf1.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">�û��ʺţ�</li>
 <li class="l21"><?=$_SESSION[FCWuser]?></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �ǳƣ�</li>
 <li class="l2"><input type="text" class="inp" name="tnc" value="<?=$rowuser[nc]?>" /></li>
 <li class="l1">�����ַ��</li>
 <li class="l21"><?=$rowuser["email"]?> <a href="emailbd.php" class="blue">[�޸������ַ]</a></li>
 <li class="l1">�ֻ����룺</li>
 <li class="l21"><?=$rowuser[mot]?> <a href="mobbd.php" class="blue">[�޸��ֻ�����]</a></li>
 <li class="l1">�绰���룺</li>
 <li class="l2"><input type="text" class="inp" name="tutel" value="<?=$rowuser[utel]?>" /></li>
 <li class="l1">QQ���룺</li>
 <li class="l2"><input type="text" class="inp" name="tqq" value="<?=$rowuser[qq]?>" /></li>
 <li class="l1">��������</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" onchange="areacha(<?=$rowuser[areaid]?>)">
 <option value="0">δѡ��</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($rowuser[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="30" width="300" border="0" frameborder="0" src="../config/areas.php?nid=<?=$rowuser[areaids]?>&id=<?=$rowuser[areaid]?>"></iframe>
 <? if($rowuser[areaid]==""){?>
 <script language="javascript">areacha(0);</script>
 <? }?>
 </div>
 </li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("�����޸�")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>