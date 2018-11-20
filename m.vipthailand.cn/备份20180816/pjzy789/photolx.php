<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
//入库操作开始
if($_GET[control]=="add" && $_POST["jvs"]=="photo"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 zwzr();
 while1("id,uid,usertype,zjuid","fcw_user where uid='".sqlzhuru($_POST[tuid])."' and usertype=7");if(!$row1=mysql_fetch_array($res1)){Audit_alert("会员验证有误！","photolx.php");}
 $bh=time()."p".$row1[id];
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_jia_photo","uid,bh,type1id,typesx,zt,sj,lastsj,djl,zjuid,ifxj","'".sqlzhuru($_POST[tuid])."','".$bh."',".sqlzhuru($_POST[type1v]).",'".sqlzhuru($_POST[type23v])."',99,'".$sj."','".$sj."',0,'".$row1[zjuid]."',0");
 php_toheader("photo.php?bh=".$bh);

}elseif($_GET[control]=="update" && $_POST["jvs"]=="photo"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $bh=$_GET[bh];
 updatetable("fcw_jia_photo","type1id=".sqlzhuru($_POST[type1v]).",typesx='".sqlzhuru($_POST[type23v])."' where bh='".$bh."'");
 php_toheader("photo.php?bh=".$bh);

}
//入库操作结束
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
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
function uidsel(){
document.f1.tuid.value=document.f1.d1.value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_jia.php");?>

<div class="right">

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">效果图</a>
 <a href="photolist.php">返回列表</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 c=document.getElementsByName("C"+nowty1I);
 str=",";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+",";}
 }
 document.f1.type23v.value=str;
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
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
 <label onclick="ty1onc(<?=$i?>)"><input name="R1" id="tyr1<?=$i?>" type="radio"<? if(0==$i){?> checked="checked"<? }?> value="<?=$row1[id]?>" /> <?=$row1[type1]?></label>
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
 <label>
 <input name="C<?=$i?>" type="checkbox" value="<?=$row3[id]?>" /> <?=$row3[type3]?>
 </label>
 <? }?>
 </li>
 </ul>
 <? }?>
 </div>
 <? }?>
 <ul class="uk">
 <li class="l1">选择会员：</li>
 <li class="l2">
 <input name="tuid" size="30" type="text" class="inp" />
 <select name="d1" onchange="uidsel()" class="inp" style="margin-left:10px;">
 <option value="">最近使用</option>
 <? while1("uid,nc,adminczsj","fcw_user where usertype=7 order by adminczsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[uid]?>"><?=$row1[uid]." ".$row1[nc]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><input type="submit" value="下一步" class="btn1" /></li>
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
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
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
 <label onclick="ty1onc(<?=$i?>)">
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
 <label>
 <input name="C<?=$i?>" type="checkbox" value="<?=$row3[id]?>" <? if(strstr($row[typesx],",".$row3[id].",")){?> checked="checked"<? }?>/> <?=$row3[type3]?>
 </label>
 <? }?>
 </li>
 </ul>
 <? }?>
 </div>
 <? }?>
 <ul class="uk">
 <li class="l3"><input type="submit" value="下一步" class="btn1" /></li>
 </ul>
 </form>
 <script language="javascript">ty1onc(<?=$ni?>);</script>
 <? }?>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>