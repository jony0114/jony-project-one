<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/pinyin.php");
AdminSes_audit();


//������ʼ
if($_GET[control]=="add" && $_POST[jvs]=="xq"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0501,")){Audit_alert("Ȩ�޲���","default.php");}
 while1("uid,usertype","fcw_user where uid='".sqlzhuru($_POST[tuid])."' and usertype=5");
 if(!$row1=mysql_fetch_array($res1)){Audit_alert("��Ա��֤����","xqlx.php");}
 zwzr();
 $bh=time()."xq".returnuserid($_POST[tuid]);
 $sj=date("Y-m-d H:i:s");
 if(panduan("xq","fcw_xq where xq='".sqlzhuru($_POST[txq])."' and zt<>99")==1){Audit_alert("С�������ѱ�ʹ�ã���������","xqlx.php");}
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[txq]));
 intotable("fcw_xq","bh,uid,sj,xq,py,pyall,areaid,areaids,admin,zt,djl,ifxj","'".$bh."','".$_POST[tuid]."','".$sj."','".sqlzhuru($_POST[txq])."','".substr($pyall,0,1)."','".$pyall."',0,0,1,99,1,0");
 php_toheader("xqinf.php?bh=".$bh);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0501,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $bh=$_GET[bh];
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[txq]));
 if(panduan("xq","fcw_xq where xq='".sqlzhuru($_POST[txq])."' and bh<>'".$bh."'")==1){Audit_alert("С�������ѱ�ʹ�ã���������","xqlx.php?action=update&bh=".$bh);}
 updatetable("fcw_xq","xq='".sqlzhuru($_POST[txq])."',py='".substr($pyall,0,1)."',pyall='".$pyall."' where bh='".$bh."'");
 php_toheader("xqinf.php?bh=".$_GET[bh]);

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
<script language="javascript">
function uidsel(){
document.f1.tuid.value=document.f1.d1.value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0502,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_loupan.php");?>

<div class="right">

 <div class="rights">
 &nbsp;&nbsp;��ܰ��ʾ��<br>&nbsp;&nbsp;С����Ϣ����̨�ܲ�������������ڻ�Ա���������<br>&nbsp;&nbsp;С����¥��֮����໥ת��������Ҫ�з�����˾���ʺ���Ϊ���У�<strong class="blue">������ע��һ��ȫ�µķ�����˾���ʺ�ר�����ڵǼ�С����Ϣ</strong>��
 </div>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">����С��</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.txq.value).replace(/\s/,"")==""){alert("������С�����ƣ�");document.f1.txq.focus();return false;}
 if(document.f1.tuid.value==""){alert("�������Ա�ʺ�");document.f1.tuid.focus();return false;} 
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="xqlx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="xq" name="jvs" />
 <ul class="uk">
 <li class="l1">С�����ƣ�</li>
 <li class="l2"><input type="text" class="inp" size="30" name="txq" /></li>
 <li class="l1">ѡ���Ա��</li>
 <li class="l2">
 <input name="tuid" size="30" type="text" class="inp" />
 <select name="d1" onchange="uidsel()" class="inp" style="margin-left:10px;">
 <option value="">���ʹ��</option>
 <? while1("uid,nc,adminczsj","fcw_user where usertype=5 order by adminczsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[uid]?>"><?=$row1[uid]." ".$row1[nc]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <? 
 }elseif($_GET[action]=="update"){
 $bh=$_GET[bh];
 while0("*","fcw_xq where bh='".$bh."' and admin=1");if(!$row=mysql_fetch_array($res)){php_toheader("xqlist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.txq.value).replace(/\s/,"")==""){alert("������С�����ƣ�");document.f1.txq.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="xqlx.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="xq" name="jvs" />
 <ul class="uk">
 <li class="l1">С�����ƣ�</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[xq]?>" name="txq" /></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>