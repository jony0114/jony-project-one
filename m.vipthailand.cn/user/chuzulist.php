<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
while1("uid,sxnum","fcw_user where uid='".$_SESSION[FCWuser]."'");$row1=mysql_fetch_array($res1);$sxnum=$row1[sxnum];
$userid=returnuserid($_SESSION[FCWuser]);
$djsx=0;
while2("*","fcw_userdjsx where userid=".$userid);if($row2=mysql_fetch_array($res2)){$djsx=$row2[sxnum];}

//FUNB
if($_GET[control]=="gx"){

 if($_GET[jl]=="none"){
  while1("*","fcw_fang where type1='����' and (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and zt=0 order by sj desc");
  while($row1=mysql_fetch_array($res1)){
  if($sxnum>0 || $djsx>0){if($sxnum>0){$sxnum=$sxnum-1;}if($sxnum==0){$djsx=$djsx-1;}updatetable("fcw_fang","sj='".$sj."' where id=".$row1[id]);}
  }
 }else{
  $a=$_GET[jl];
  $b=preg_split("/,/",$a);
  for($i=0;$i<=count($b);$i++){
  if($b[$i]!=""){
   if($sxnum>0 || $djsx>0){if($sxnum>0){$sxnum=$sxnum-1;}if($sxnum==0){$djsx=$djsx-1;}updatetable("fcw_fang","sj='".$sj."' where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$b[$i]."'");}
  }
  }
 }
updatetable("fcw_user","sxnum=".$sxnum." where uid='".$_SESSION[FCWuser]."'");
updatetable("fcw_userdjsx","sxnum=".$djsx." where userid=".$userid);
php_toheader("chuzulist.php?t=suc");

}
//FUNE


$ses=" where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and type1='����' and zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[sd1]!=""){$ses=$ses." and wylx='".$_GET[sd1]."'";}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
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
function ser(){
 location.href="chuzulist.php?st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;	
}
function gxfang(x){
 if(x==1){
 var c=document.getElementsByName("C1");
 str="";for(i=0;i<c.length;i++){if(c[i].checked){if(str==""){str=c[i].value;}else{str=str+","+c[i].value;}}}
 if(str==""){alert("����ѡ��һ�����ݣ�");return false;}
 v=str;
 }else if(x==2){
 v="none";
 }
 if(confirm("ȷ��Ҫ������")){location.href="chuzulist.php?control=gx&jl="+v;}else{return false;}
}

function yyover(x){
document.getElementById("yy"+x).style.display="";
}
function yyout(x){
document.getElementById("yy"+x).style.display="none";
}

function dely(x){
 if(confirm("ȷ��Ҫɾ��������ԴԤԼ��")){location.href="delyy.php?fid="+x;}else{return false;}
}

</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ҵĳ�����Ϣ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",2,");?>
 <!--selB-->
 <ul class="psel">
 <li class="l1">��Ϣ���⣺</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">��ҵ���ͣ�</li>
 <li class="l2">
 <select id="sd1">
 <option value="">==����==</option>
 <? $xs="chuzu";while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[name1]?>"<? if(strstr($_GET[sd1],$row1[name1])!=""){?> selected="selected"<? }?>><?=$row1[name2]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <!---selE-->

 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap<?=$_GET[zt]?>").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">��Դ��Ϣ</li>
 <li class="l2">���</li>
 <li class="l3">��ע</li>
 <li class="l4">�ƹ�״̬</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <? if($_SESSION[FCWuserID]==4){?>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(23,'fcw_fang')" class="a1">��˷�Դ</a>
 <? }?>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(1,'fcw_fang')" class="a1">�����Ƽ�</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(2,'fcw_fang')" class="a1">ȡ���Ƽ�</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(4,'fcw_fang')" class="a2">ɾ��</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(3,'fcw_fang')" class="a1">�ϼ�/�¼�</a>
 <a href="javascript:void(0)" onclick="gxfang(1)" class="a1">����ѡ��</a>
 <a href="javascript:void(0)" onclick="gxfang(2)" class="a1">����ȫ��</a>
 </li>
 <li class="l3"><span class="fd">ʣ��ˢ����Ϊ<strong><?=$sxnum+$djsx?></strong> [<a href="adsx.php?ty=fang" class="red">����</a>]</span></li>
 </ul>
 <?
 $sj1=dateYMD($sj)." 00:00:00";
 $sj2=dateYMD($sj)." 23:59:59";
 pagef($ses,20,"fcw_fang","order by sj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>�ϼ�</span>";}else{$xjv="<span class='red'>���¼�</span>";}
 $aurl="chuzu.php?bh=".$row[bh];
 
 if(empty($row[zddq])){$ifzd=0;}else{
  if(strtotime($row[zddq])<=strtotime($sj)){$ifzd=0;}else{
  $ifzd=1;
  $second=strtotime($row[zddq])-strtotime($sj);
  $day = floor($second/(3600*24));
  $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
  $hour = floor($second/3600);
  $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
  $minute = floor($second/60);
  $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
  $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
  }
 }
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[sj]?></li>
 </ul>
  <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
  <li class="l0"><? if(1==$row[mytj]){?>��<br>��<br>��<? }?></li>
  <li class="l1">
  <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."' order by iffm desc","-1"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
  <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1">[<?=$row[wylx]?>] <?=returntitdian($row["tit"],78)?></a><br>
  <?=$xjv." | ".returnztv($row[zt],$row[ztsm])?>
  <!--ԤԼB-->
  <?
  $ifyy=0;if(panduan("*","fcw_cflist where fid=".$row[id]." and sj>='".$sj1."' and sj<='".$sj2."'")==1){$ifyy=1;
  ?>
  | <a href="javascript:void(0);" onmouseover="yyover(<?=$row[id]?>)" onmouseout="yyout(<?=$row[id]?>)" class="feng">�鿴���¼�¼</a>
  <? }?>
  <br>
  <? 
  if($ifyy==1){
  while1("*","fcw_cflist where fid=".$row[id]." order by sj asc");$row1=mysql_fetch_array($res1);
  $sjc1=$row1[sj];
  while1("*","fcw_cflist where fid=".$row[id]." order by sj desc");$row1=mysql_fetch_array($res1);
  $sjc2=$row1[sj];
  $d1 = strtotime(dateYMD($sjc1)." 00:00:00");
  $d2 = strtotime(dateYMD($sjc2)." 00:00:00");
  $Days = round(($d2-$d1)/3600/24)+1;
  $syday = round(($d2-strtotime(dateYMD($sj)." 00:00:00"))/3600/24);
  ?>
  <div class="yy" style="display:none;" id="yy<?=$row[id]?>">
  <?
  $jtnum=0;
  while1("*","fcw_cflist where fid=".$row[id]." and sj>='".$sj1."' and sj<='".$sj2."' order by sj asc");while($row1=mysql_fetch_array($res1)){
  if(0==$row1[ifok]){$fb="δ����";}else{$fb="�ѷ���";}
  $jtnum++;
  ?>
  <span class="s<?=$row1[ifok]?>">&nbsp;&nbsp;&nbsp;&nbsp;ԤԼʱ�䣺<?=$row1[sj]?> <?=$fb?></span><br>
  <?
  }
  ?>
  </div>
  <? }?>
  <!--ԤԼE-->
  </li>
  <li class="l2"><strong class="feng"><?=returnjgdw($row[money1],$row[jgdw])?></strong></li>
  <li class="l3"><?=$row[djl]?></li>
  <li class="l4 hui">
  <? if(0==$row[zt]){?>
  <? if(0==$ifzd){?>
  <a href="adzd.php?bh=<?=$row[bh]?>&ty=chuzu" class="a1">�����ö�λ</a>
  <? }elseif(1==$ifzd){echo "<strong class='red'>���ö�,λ��:".$row[zdxh]."</strong><br>ʣ".$sjcv;}?>
  <? }?>

  <? if($ifyy==0){?>
  <a href="yycf.php?fid=<?=$row[id]?>" class="green">��ԤԼˢ�¡�</a>
  <? }else{?>
  <a href="javascript:void(0);" onclick="dely(<?=$row[id]?>)" class="red" title="�˷�Դ�ܹ�ԤԼ<?=$Days?>�죬��ʣ<?=$syday?>�죬����ԤԼ����<?=$jtnum?>��">
  ��ɾ��ԤԼ(<?=$jtnum?>�� <?=$syday?>/<?=$Days?>)��</a> 
  <? }?>

  </li>
  <li class="l5">
  <a href="<?=$aurl?>">�޸�</a><br>
  <a href="fanggj.php?bh=<?=$row[bh]?>">����</a><br>
  <a href="../rent/view<?=$row[id]?>.html" target="_blank">Ԥ��</a>
  </li>
  </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="chuzulist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1]."&sd1=".$_GET[sd1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>