<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(3!=$_SESSION[FCWuserID]){Audit_alert("�����·����Դ��","./");}

$bh=$_GET[bh];
while0("*","fcw_jia_jc where bh='".$bh."' and uid='".$_SESSION[FCWuser]."'");if(!$row=mysql_fetch_array($res)){php_toheader("jclist.php");}
//������ʼ
if($_GET[control]=="update"){
 zwzr();
 if($rowcontrol[jcfy]=="on"){$zt=0;}else{$zt=1;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $myty=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 updatetable("fcw_jia_jc","
			 mytype1id=".$myty[0].",
			 mytype2id=".$myty[1].",
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 zt=".$zt.",
			 ifxj=".sqlzhuru($_POST[Rifxj]).",
			 mytj=".sqlzhuru($_POST[Rmytj]).",
			 money1=".$money1.",
			 buyurl='".sqlzhuru($_POST[tbuyurl])."' where bh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 uploadtp($bh,"�Ҿӽ���",$_SESSION[FCWuser]);
 php_toheader("jc.php?t=suc&action=update&bh=".$bh);

}
//�������

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

<link href="../config/ueditor_mini/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script src="../config/ueditor_mini/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.min.js"></script>
<script type="text/javascript" src="../config/ueditor_mini/lang/zh-cn/zh-cn.js"></script>
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
 <? returnuserqx($userqx,",10,");?>
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","jc.php?action=".$_GET[action]."&bh=".$bh)?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 tjwait();
 f1.action="jc.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ϵͳ���飺</li>
 <li class="l21">
 <strong class="blue">
 <?=returnjcty(1,$row[type1id])." - ".returnjcty(2,$row[type2id])." - ".returnjcty(3,$row[type3id])?> [<a href="jclx.php?action=update&bh=<?=$bh?>">�޸ķ���</a>]
 </strong> 
 </li>
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">�ۼۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" size="5" value="<?=$row[money1]?>" /><span class="fd fd1">Ԫ (С��ʾ��0�����ձ�ʾ������ѯ)</span></li>
 <li class="l1">�������ӣ�</li>
 <li class="l2"><input type="text" class="inp" name="tbuyurl" size="70" value="<?=$row[buyurl]?>" /></li>
 <li class="l1">���ڷ��飺</li>
 <li class="l2">
 <select name="d1">
 <option value="0xcf0">ѡ����Ʒ����</option>
 <? while1("*","fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$row[mytype1id] && $row[mytype2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[type1]?></option>
 <? while2("*","fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and admin=2 and type1='".$row1[type1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$row[mytype1id] && $row2[id]==$row[mytype2id]){?> selected="selected"<? }?>> - <?=$row2[type2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
 </ul>
 
 <ul class="uk1">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <ul class="tpupload">
 <li class="tl3">1.���������ϴ� 7 ��Ч��ͼ����ѳߴ磺800*800��</li>
 <li class="tl4">
 <? 
 while1("id,bh,tp,type1,xh","fcw_tp where bh='".$bh."' and uid='".$_SESSION[FCWuser]."' order by xh asc");
 for($i=1;$i<=7;$i++){
 $tpv="";$tpid="";
 if($row1=mysql_fetch_array($res1)){$tp=preg_split("/\./",$row1[tp]);$tp1=preg_split("/\//",$tp[0]);$tpv=$tp1[4];$tpid=$row1[id];}
 ?>
 <span class="tpf" onmouseover="tphover(<?=$i?>)" onmouseout="tphout(<?=$i?>)"><iframe src="jcupload.php?tpbh=<?=$tpv?>&tpid=<?=$tpid?>&bh=<?=$bh?>" width="74" scrolling="no" height="91" id="tpf<?=$i?>" frameborder="0"></iframe></span>
 <? }?>
 </li>
 </ul>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l7">���飺</li>
 <li class="l8"><script name="content" id="editor" type="text/plain" style="width:100%;height:380px;"><?=$row[txt]?></script></li>
 <li class="l1">�ϼ�/�¼ܣ�</li>
 <li class="l2">
 <span class="finp">
 <input name="Rifxj" type="radio" value="0" <? if(0==$row[ifxj]){?>checked="checked"<? }?> /> �ϼ� 
 <input name="Rifxj" type="radio" value="1" <? if(1==$row[ifxj]){?>checked="checked"<? }?> /> �¼� 
 </span>
 </li>
 <li class="l1">�����Ƽ���</li>
 <li class="l2">
 <span class="fd1">
 <input name="Rmytj" type="radio" value="1"<? if(1==$row[mytj]){?> checked="checked"<? }?> /> �Ƽ�
 <input name="Rmytj" type="radio" value="0"<? if(0==$row[mytj]){?> checked="checked"<? }?> /> ��ͨչʾ
 </span>
 </li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","jclist.php")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UM.getEditor('editor');
</script>
</body>
</html>