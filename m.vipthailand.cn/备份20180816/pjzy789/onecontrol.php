<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$tyid=$_GET[tyid];
if(empty($tyid)){$tyid=1;}

if($_GET[control]=="update"){
 $sj=date("Y-m-d H:i:s");
 if(panduan("tyid","fcw_onecontrol where tyid=".$tyid)==1){
 updatetable("fcw_onecontrol","sj='".$sj."',txt='".sqlzhuru($_POST[content])."' where tyid=".$tyid);
 }else{
 intotable("fcw_onecontrol","sj,tyid,txt","'".$sj."',".$tyid.",'".sqlzhuru($_POST[content])."'");
 }
 php_toheader("onecontrol.php?t=suc&tyid=".$tyid);
}

while0("*","fcw_onecontrol where tyid=".$tyid);$row=mysql_fetch_array($res);

//ע����ҳ������������������ҳ���ݣ���Ҫͬ����returnonecon�����������
$ar=array("��˾���","��չ����","��˾Ը��","Ʒ�Ʒ�չ","��ϵ����(���߻س�����)","��������","�����׶�","���н׶�","���۽׶�","�ײ���Ȩ");
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
 <? $leftid=4;include("menu_quan.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","onecontrol.php?tyid=".$tyid);}?>
 <!--B-->
 <div class="rkuang">
 <div class="bqu1">
 <? for($i=0;$i<count($ar);$i++){?>
 <a href="onecontrol.php?tyid=<?=$i+1?>"<? if($tyid==($i+1)){?> class="a1"<? }?>><?=$ar[$i]?></a>
 <? }?>
 </div> 
 <script language="javascript">
 function tj(){
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="onecontrol.php?tyid=<?=$tyid?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=returnonecon($tyid)?>" class="inp redony" readonly="readonly" name="ttit" /></li>
 <li class="l10"><span class="red">*</span> ��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
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