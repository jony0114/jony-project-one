<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

//入库操作开始
if($_GET[control]=="add" && $_POST["jvs"]=="photo"){
 zwzr();
 while1("id,uid,usertype,zjuid","fcw_user where uid='".$_SESSION[FCWuser]."' and usertype=7");if(!$row1=mysql_fetch_array($res1)){Audit_alert("会员验证有误！","photolx.php");}
 $bh=time()."p".$row1[id];
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_jia_photo","uid,bh,type1id,typesx,zt,sj,lastsj,djl,zjuid,ifxj","'".$_SESSION[FCWuser]."','".$bh."',".sqlzhuru($_POST[type1v]).",'".sqlzhuru($_POST[type23v])."',99,'".$sj."','".$sj."',0,'".$row1[zjuid]."',0");
 php_toheader("photo.php?bh=".$bh);

}elseif($_GET[control]=="update" && $_POST["jvs"]=="photo"){
 zwzr();
 $bh=$_GET[bh];
 updatetable("fcw_jia_photo","type1id=".sqlzhuru($_POST[type1v]).",typesx='".sqlzhuru($_POST[type23v])."' where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."'");
 php_toheader("photo.php?bh=".$bh);

}
//入库操作结束
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
var nowty1I;
function ty1onc(x){
 nowty1I=x;
 document.f1.type1v.value=document.getElementById("tyr1"+x).value;
 a=document.getElementById("tyalli").innerHTML;
 for(i=0;i<a;i++){
  document.getElementById("tydiv"+i).style.display="none";
 }
  document.getElementById("tydiv"+x).style.display="";
  document.getElementById("tyr1"+x).checked=true;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 装修效果图</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",1,");?>
 
 <? include("rcap10.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>

 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 c=document.getElementsByName("C"+nowty1I);
 str=",";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+",";}
 }
 document.f1.type23v.value=str;
 tjwait();
 f1.action="photolx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="type1v" />
 <input type="hidden" name="type23v" />
 <input type="hidden" value="photo" name="jvs" />
 <ul class="uk1">
 <li class="l1">效果图分类：</li>
 <li class="l2">
 <? 
 $i=0;
 $ty1idarr=array();
 $ty1arr=array();
 while1("*","fcw_jia_phototype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ty1idarr[$i]=$row1[id];
 $ty1arr[$i]=$row1[type1];
 ?>
 <label class="s1 hand" onclick="ty1onc(<?=$i?>)">
 <input name="R1" id="tyr1<?=$i?>" type="radio"<? if(0==$i){?> checked="checked"<? }?> value="<?=$row1[id]?>" /> <?=$row1[type1]?>
 </label>
 <? $i++;}?>
 <span id="tyalli" style="display:none;"><?=$i?></span>
 </li>
 </ul>
 <? for($i=0;$i<count($ty1arr);$i++){?>
 <div id="tydiv<?=$i?>" style="display:none;">
 <? while2("*","fcw_jia_phototype where admin=2 and type1='".$ty1arr[$i]."'");while($row2=mysql_fetch_array($res2)){?>
 <ul class="uk1">
 <li class="l1"><?=$row2[type2]?>：</li>
 <li class="l2">
 <? 
 while3("*","fcw_jia_phototype where admin=3 and type1='".$ty1arr[$i]."' and type2='".$row2[type2]."' order by xh asc");while($row3=mysql_fetch_array($res3)){
 ?>
 <label class="s1">
 <input name="C<?=$i?>" type="checkbox" value="<?=$row3[id]?>" /> <?=$row3[type3]?>
 </label>
 <? }?>
 </li>
 </ul>
 <? }?>
 </div>
 <? }?>
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步")?></li>
 </ul>
 </form>
 <script language="javascript">ty1onc(0);</script>
 
 <? 
 }else{
 while0("*","fcw_jia_photo where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$_GET[bh]."'");if(!$row=mysql_fetch_array($res)){php_toheader("photolist.php");}
 ?>
 <script language="javascript">
 function tj(){
 c=document.getElementsByName("C"+nowty1I);
 str=",";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+",";}
 }
 document.f1.type23v.value=str;
 tjwait();
 f1.action="photolx.php?control=update&bh=<?=$_GET[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="type1v" />
 <input type="hidden" name="type23v" />
 <input type="hidden" value="photo" name="jvs" />
 <ul class="uk1">
 <li class="l1">效果图分类：</li>
 <li class="l2">
 <? 
 $i=0;
 $ty1idarr=array();
 $ty1arr=array();
 while1("*","fcw_jia_phototype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ty1idarr[$i]=$row1[id];
 $ty1arr[$i]=$row1[type1];
 ?>
 <label class="s1 hand" onclick="ty1onc(<?=$i?>)">
 <input name="R1" id="tyr1<?=$i?>" type="radio"<? if($row[type1id]==$row1[id]){$ni=$i;?> checked="checked"<? }?> value="<?=$row1[id]?>" /> <?=$row1[type1]?>
 </label>
 <? $i++;}?>
 <span id="tyalli" style="display:none;"><?=$i?></span>
 </li>
 </ul>
 <? for($i=0;$i<count($ty1arr);$i++){?>
 <div id="tydiv<?=$i?>" style="display:none;">
 <? while2("*","fcw_jia_phototype where admin=2 and type1='".$ty1arr[$i]."'");while($row2=mysql_fetch_array($res2)){?>
 <ul class="uk1">
 <li class="l1"><?=$row2[type2]?>：</li>
 <li class="l2">
 <? 
 while3("*","fcw_jia_phototype where admin=3 and type1='".$ty1arr[$i]."' and type2='".$row2[type2]."' order by xh asc");while($row3=mysql_fetch_array($res3)){
 ?>
 <label class="s1">
 <input name="C<?=$i?>" type="checkbox" value="<?=$row3[id]?>" <? if(strstr($row[typesx],",".$row3[id].",")){?> checked="checked"<? }?>/> <?=$row3[type3]?>
 </label>
 <? }?>
 </li>
 </ul>
 <? }?>
 </div>
 <? }?>
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步")?></li>
 </ul>
 </form>
 <script language="javascript">ty1onc(<?=$ni?>);</script>

 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>