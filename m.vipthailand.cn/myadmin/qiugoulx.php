<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

//入库操作开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $qx=",4,";
 while1("id,nc,mot,uid,qx,usertype,zjuid","fcw_user where uid='".sqlzhuru($_POST[tuid])."' and (usertype=1 or usertype=2) and qx like '%".$qx."%'");
 if(!$row1=mysql_fetch_array($res1)){Audit_alert("会员验证有误！","qiugoulx.php");}
 $bh=time()."f".$row1[id];
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_fang","bh,uid,sj,uip,type1,fbty,djl,wylx,ifok,ifxj,zt,mytj,zjuid,zdxh","'".$bh."','".sqlzhuru($_POST[tuid])."','".$sj."','".$uip."','求购',".$row1[usertype].",1,'".sqlzhuru($_POST[R1])."',0,0,99,0,'".$row1[zjuid]."',0");
 php_toheader("qiugou.php?bh=".$bh);

}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 updatetable("fcw_fang","wylx='".sqlzhuru($_POST[R1])."' where type1='求购' and bh='".$_GET[bh]."'");
 php_toheader("qiugou.php?bh=".$_GET[bh]);

}
//入库操作结束

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function wyonc(x){
ia=document.getElementById("wyalli").innerHTML
 for(i=1;i<ia;i++){
 document.getElementById("wys"+i).className="wy";	
 }
document.getElementById("wys"+x).className="wy wy1";	
document.getElementById("wylxr"+x).checked=true;	
}

function uidsel(){
document.f1.tuid.value=document.f1.d1.value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_fang.php");?>

<div class="right">
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">发布求购</a>
 </div> 
 
 <!--Begin-->
 <div class="rkuang">
 <? if($_GET[action]=="add" || $_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 if(document.f1.tuid.value==""){alert("请输入会员帐号");document.f1.tuid.focus();return false;} 
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="qiugoulx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="jvs" value="qiugou" />
 <ul class="uk1">
 <li class="l1">我要求购：</li>
 <li class="l2">
 <? 
 $i=1;
 $xs="qiugou";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <span class="wy<? if(1==$i){?> wy1<? }?>" id="wys<?=$i?>" onclick="wyonc(<?=$i?>)">
 <img src="../upload/wylx/<?=$row1[id]?>.jpg" width="80" height="80"  /><br>
 <input name="R1" id="wylxr<?=$i?>" type="radio"<? if($i==1){?> checked="checked"<? }?> value="<?=$row1[name1]?>" /> <?=$row1[name2]?>
 </span>
 <? 
 $i++;
 }
 ?>
 <span id="wyalli" style="display:none;"><?=$i?></span>
 </li>
 </ul>
 <ul class="uk">
 <li class="l1">选择会员：</li>
 <li class="l2">
 <input name="tuid" size="30" type="text" class="inp" />
 <select name="d1" onchange="uidsel()" class="inp" style="margin-left:10px;">
 <option value="">最近使用</option>
 <? while1("uid,nc,adminczsj","fcw_user where (usertype=1 or usertype=2) order by adminczsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[uid]?>"><?=$row1[uid]." ".$row1[nc]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><input type="submit" value="下一步" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }else{
 while0("id,bh,uid,type1,wylx","fcw_fang where id=".$_GET[id]." and type1='求购'");if(!$row=mysql_fetch_array($res)){php_toheader("qiugoulist.php");}
 ?>
 <script language="javascript">
 function tj(){
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="qiugoulx.php?control=update&bh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="jvs" value="qiugou" />
 <ul class="uk1">
 <li class="l1">我要求购：</li>
 <li class="l2">
 <? 
 $i=1;
 $xs="qiugou";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <span class="wy<? if($row1[name1]==$row[wylx]){?> wy1<? }?>" id="wys<?=$i?>" onclick="wyonc(<?=$i?>)">
 <img src="../upload/wylx/<?=$row1[id]?>.jpg" width="80" height="80"  /><br>
 <input name="R1" id="wylxr<?=$i?>" type="radio"<? if($row1[name1]==$row[wylx]){?> checked="checked"<? }?> value="<?=$row1[name1]?>" /> <?=$row1[name2]?>
 </span>
 <? 
 $i++;
 }
 ?>
 <span id="wyalli" style="display:none;"><?=$i?></span>
 </li>
 </ul>
 <ul class="uk">
 <li class="l3"><input type="submit" value="下一步" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--End-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>