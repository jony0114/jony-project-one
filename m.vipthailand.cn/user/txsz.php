<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."' and ifmot=1";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("��δ�󶨰�ȫ�ֻ������Ƚ��а�","mobbd.php");}

if(sqlzhuru($_POST[jvs])=="tx"){
 zwzr();
 if(empty($_POST[t1])){Audit_alert("��֤������","txsz.php");}
 if(panduan("uid,getpwd","fcw_user where getpwd='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[FCWuser]."'")==0){Audit_alert("��֤������","txsz.php");}
 if(!empty($_POST[tzfmm])){$zfmm=sha1(sqlzhuru($_POST[tzfmm]));$ses=",zfmm='".$zfmm."'";}else{$ses="";}
 updatetable("fcw_user","txyh='".sqlzhuru($_POST[ttxyh])."',txname='".sqlzhuru($_POST[ttxname])."',txzh='".sqlzhuru($_POST[ttxzh])."',txkhh='".sqlzhuru($_POST[ttxkhh])."',getpwd=''".$ses." where uid='".$_SESSION[FCWuser]."'");
 php_toheader("txsz.php?t=suc"); 

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
 if((document.f1.ttxzh.value).replace("/\s/","")==""){alert("�����뿨��/�˺�");document.f1.ttxzh.focus();return false;}
 if((document.f1.ttxname.value).replace("/\s/","")==""){alert("�����뻧��");document.f1.ttxname.focus();return false;}
 if((document.f1.t1.value).replace("/\s/","")==""){alert("��������֤��");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="txsz.php";
}


//���Ϳ�ʼ
var sz;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}

function updatePage() {
  if (xmlHttp.readyState == 4) {
    response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	response=response.replace(/\s+/g,"");
	if(response=="err"){clearInterval(sz);document.getElementById("sjzouv").innerHTML=120;document.getElementById("fsid1").style.display="none";document.getElementById("fsid2").style.display="";alert("���Ȱ��ֻ�");return false;}
   else{sz=setInterval("sjzou()",1000);return false;}
  }
}


function yzonc(){
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "mobtx.php";
 xmlHttp.open("post", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function txlxcha(){
 tx=document.getElementById("ttxyh").value;
 if(tx=="֧����" || tx=="�Ƹ�ͨ"){document.getElementById("khh1").style.display="none";document.getElementById("khh2").style.display="none";}
 else{document.getElementById("khh1").style.display="";document.getElementById("khh2").style.display="";}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="l1 l2";
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="tx" name="jvs" />
 <ul class="uk">
 <li class="l1">�������ͣ�</li>
 <li class="l2">
 <select name="ttxyh" id="ttxyh" onchange="txlxcha()">
 <?
 $yharr=array("��������","ũҵ����","��������","�й�����","֧����","�Ƹ�ͨ");
 for($i=0;$i<count($yharr);$i++){
 ?>
 <option value="<?=$yharr[$i]?>"<? if($rowuser[txyh]==$yharr[$i]){?> selected="selected"<? }?>><?=$yharr[$i]?></option>
 <?
 }
 ?>
 </select>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>����/�˺ţ�</li>
 <li class="l2"><input type="text" value="<?=$rowuser[txzh]?>" class="inp" name="ttxzh" /></li>
 <li class="l1" id="khh1"<? if($rowuser[txyh]=="֧����" || $rowuser[txyh]=="�Ƹ�ͨ"){?> style="display:none;"<? }?>>�����У�</li>
 <li class="l2" id="khh2"<? if($rowuser[txyh]=="֧����" || $rowuser[txyh]=="�Ƹ�ͨ"){?> style="display:none;"<? }?>><input type="text" value="<?=$rowuser[txkhh]?>" class="inp" name="ttxkhh" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>������</li>
 <li class="l2"><input type="text" value="<?=$rowuser[txname]?>" class="inp" name="ttxname" /> �ʺŶ�Ӧ������</li>
 <li class="l1">��֧�����룺</li>
 <li class="l2"><input type="password" class="inp" name="tzfmm" /> ������޸ģ�������</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>�ֻ���֤�룺</li>
 <li class="l2"><input type="text" class="inp" name="t1" /> ����ǰ�󶨵��ֻ�����<?=strgb2312($rowuser[mot],0,6)?>*****����<a href="mobbd.php" class="feng">�޸��ֻ�����</a>��</li>
 <li class="l1"></li>
 <li class="l21" id="fsid1" style="display:none;">�����С���(<span id="sjzouv" class="red">120</span>��)</li>
 <li class="l21" id="fsid2">[<a href="#" onclick="javascript:yzonc();">������֤��</a>]</li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�ύ")?></li>
 </ul>
 </form>

 
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>