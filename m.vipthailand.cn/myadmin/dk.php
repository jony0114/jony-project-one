<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_daikuan where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("dklist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 updatetable("fcw_daikuan","
			 zt=".$_POST[Rzt]." where bh='".$bh."'");
 php_toheader("dk.php?t=suc&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu6").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_ad.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","dk.php?bh=".$bh);}?>

 <div class="bqu1">
 <a class="a1" href="javascript:void(0);">�������</a>
 <a href="dklist.php">�����б�</a>
 </div>

 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="dk.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">�����</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[dkje]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">������;��</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[dkyt]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">�������ޣ�</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[dkqx]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">��ʵ������</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[zsxm]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">���֤�ţ�</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[sfzh]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">QQ���룺</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[qqhm]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">ѧ����</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[xl]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">����״����</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[hyzk]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">ְҵ��</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[zy]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">�ֻ����룺</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[mot]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[sj]?>" class="inp redony" readonly="readonly" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">���������</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>δ����</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /><strong>�Ѿ�����</strong></label> 
 </span>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>