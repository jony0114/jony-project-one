<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
require("../config/pinyin.php");
AdminSes_audit();
$bh=$_GET[bh];

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $txt=sqlzhuru($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 if(panduan("*","fcw_shangquan where tit='".$tit."' and bh<>'".$bh."' and zt<>99")==1){Audit_alert("��Ȧ�����Ѿ�����","shangquan.php?bh=".$bh);}
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[ttit]));
 updatetable("fcw_shangquan","
			 areaid=".sqlzhuru($_POST[d1]).",
			 tit='".$tit."',
			 txt='".$txt."',
			 sj='".sqlzhuru($_POST[tsj])."',
			 py='".substr($pyall,0,1)."',
			 djl=".$_POST[tdjl].",
			 zt=0 where bh='".$bh."'");
 uploadtpnodata(1,"upload/shangquan/".$bh."/","home.jpg","allpic",295,370,0,0,"no");
 php_toheader("shangquan.php?t=suc&action=update&bh=".$bh);

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

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='shangquanlx.php'>�����������Ȧ</a>]","shangquan.php?bh=".$bh);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��Ȧ��Ϣ</a>
 <a href="shangquanlist.php">�����б�</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <?
 while0("*","fcw_shangquan where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("shangquanlist.php");}
 $tp="../upload/shangquan/".$bh."/home.jpg";
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("��������Ȧ����");document.f1.ttit.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="shangquan.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ��������</li>
 <li class="l2">
 <select name="d1" class="inp">
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>"<? if($row1[id]==$row[areaid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> ��Ȧ���ƣ�</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">��ȦЧ��ͼ��</li>
 <li class="l2"><input type="file" name="inp1" class="inp1" id="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺295*370</span></li>
 <? if(is_file($tp)){?>
 <li class="l8"></li>
 <li class="l9"><a href="<?=$tp?>" target="_blank"><img border=0 src="<?=$tp?>" width="90" height="67" /></a></li>
 <? }?>
 <li class="l10"><span class="red">*</span> ��Ȧ���ܣ�</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��ע�ȣ�</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/><span class="fd">��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>