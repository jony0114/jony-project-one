<?
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
$timestamp = time();

$tptyarr=preg_split("/,/",tptyarr_d);
$tpnumarr=preg_split("/,/",tpnumarr_d);
$tpnum=$_GET[tpnum];
if(!in_array($tpnum,$tpnumarr)){$tpnum=0;}
$ses=" where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."' and zt<>99 and tyid=".$tpnumarr[$tpnum];
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
while1("*","fcw_user where uid='".$_SESSION[FCWuser]."'");$row1=mysql_fetch_array($res1);$pwd=$row1[pwd];

if($_GET[control]=="fm"){
 updatetable("fcw_xqphoto","iffm=0 where xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."' and tyid=".$tpnumarr[$tpnum]);
 updatetable("fcw_xqphoto","iffm=1 where xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."' and id=".$_GET[id]);
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

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">

</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ¥�̹���</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap4").className="l1 l2";
 </script>
 <? 
 if(!empty($_GET[num])){$nts="��ϲ�������ι��ɹ��ϴ�".$_GET[num]."��ͼƬ";}else{$nts="��ϲ���������ɹ�!";}
 systs($nts,"loupanphotolist.php?bh=".$bh."&tpnum=".$tpnum);
 ?>
 <div class="rmenucap">
 <?
 for($i=0;$i<count($tpnumarr);$i++){
 ?>
 <a <? if($tpnumarr[$tpnum]==$tpnumarr[$i]){echo "class='a1'";}?> href="loupanphotolist.php?bh=<?=$bh?>&tpnum=<?=$i?>"><?=$tptyarr[$i]?>(<?=returncount("fcw_xqphoto where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."' and zt<>99 and tyid=".$tpnumarr[$i])?>)</a>
 <? }?>
 </div>
 <!--�ϴ�B-->
 <form name="f1" method="post">
 <ul class="uk">
 <li class="l1">��ǰ�����ࣺ</li>
 <li class="l21 blue"><strong><?=$tptyarr[$tpnum]?></strong></li>
 <li class="l3"></li>
 <li class="l4">
 
 <div id="pltp1">
  <div id="queue"></div>
  <input id="file_upload" style="display:none;" name="file_upload" type="file" multiple="true">
 </div>
 
 <div id="pltp2" class="red" style="display:none;">
  <img src="img/ajax_loader.gif" width="208" style="margin-bottom:7px;" height="13" /><br>
  ���ڴ���ͼƬ��Ϣ,ʣ��<strong id="synum"></strong>�ţ�����ˢ�»�ر�ҳ�桭��<br>
 </div>
 
 </li>
 </ul>
 </form>
 <script language="javascript">
 $(function() {
  $('#file_upload').uploadify({
    'formData'     : {
    'timestamp' : '<?= $timestamp;?>',
    'token'     : '<?=md5('unique_salt'.$timestamp);?>',
	'uid'       : '<?=returnuserid($_SESSION[FCWuser])?>',
	'tpnumv'       : '<?=$tpnum?>',
	'bh'       : '<?=$bh?>',
	'pwd'       : '<?=$pwd?>',
	'lpareaid'       : '<?=$areaid?>',
	'lpareaids'       : '<?=$areaids?>'
    },
    'swf'      : 'uploadify.swf',
	'queueID'  : 'uploaddiv',
    'uploader' : 'uploadify.php',
				
    'removeTimeout' : 1,
				
    'onDialogClose'  : function(queueData) {
     if(queueData.filesQueued>0){
	  document.getElementById("synum").innerHTML=queueData.filesQueued;
	  document.getElementById("pltp1").className="pltp1n";document.getElementById("pltp2").style.display="";
     }
    },
    'onQueueComplete' : function(queueData) {
    location.href="loupanphotolist.php?bh=<?=$bh?>&t=suc&num="+queueData.uploadsSuccessful+"&tpnum=<?=$tpnum?>";
    },
	'onUploadComplete' : function(file) {
	 document.getElementById("synum").innerHTML=parseInt(document.getElementById("synum").innerHTML)-1;
    }
				 
    });
  });
 </script>
 <div id="uploaddiv" style="display:none;"></div>
 <!--�ϴ�E-->

 <ul class="typecap">
 <li class="l1">ͼƬ��Ϣ</li>
 <li class="l2">����</li>
 <li class="l4">��ע</li>
 <li class="l3">����</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(8,'fcw_xqphoto')" class="a2">ɾ��</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_xqphoto","order by iffm desc");
 while($row=mysql_fetch_array($res)){
 $aurl="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg";
 ?>
 <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l1">
 <a href="<?=$aurl?>" target="_blank"><img border="0" class="tp" src="<?=returntppd("../upload/".$userid."/f/".$row[xqbh]."/".$row[bh]."-1.jpg","img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" target="_blank" class="a1"><?=returntitdian($row["tit"],78)?></a><br>
 <?=returnztv($row[zt])?>
 </li>
 <li class="l2"><?=$tptyarr[array_search($row[tyid],$tpnumarr)]?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l3"><?=$row[sj]?></li>
 <li class="l5">
 <a href="<?=$aurl?>" target="_blank">Ԥ��</a><br>
 <? if(1==$row[iffm]){echo "<span class='red'>����</span>";}else{?>
 <a href="loupanphotolist.php?control=fm&id=<?=$row[id]?>&tpnum=<?=$_GET[tpnum]?>&bh=<?=$bh?>">��Ϊ����</a>
 <? }?>
 </li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupanphotolist.php";
 $nowwd="bh=".$bh."&tpnum=".$tpnum;
 require("page.html");
 ?>
 </div>
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>