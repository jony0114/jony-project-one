<?
//修改该文件要同步修改fcwmanage/qiugoulx.php以及手机端
include("../config/conn.php");
include("../config/function.php");
include("mzcreg.php");
sesCheck();

//入库操作开始
if($_GET[control]=="add"){
 zwzr();
 while1("id,nc,mot,uid,zjuid","fcw_user where uid='".$_SESSION[FCWuser]."' and (usertype=1 or usertype=2)");if(!$row1=mysql_fetch_array($res1)){Audit_alert("会员验证有误！","qiugoulx.php");}
 $bh=time()."f".$row1[id];
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_fang","bh,uid,sj,uip,type1,fbty,djl,wylx,ifok,ifxj,zt,mytj,zjuid,zdxh","'".$bh."','".$_SESSION[FCWuser]."','".$sj."','".$uip."','求购',".$_SESSION[FCWuserID].",1,'".sqlzhuru($_POST[R1])."',0,0,99,0,'".$row1[zjuid]."',0");
 php_toheader("qiugou.php?bh=".$bh);

}elseif($_GET[control]=="update"){
 zwzr();
 updatetable("fcw_fang","wylx='".sqlzhuru($_POST[R1])."' where uid='".$_SESSION[FCWuser]."' and type1='求购' and bh='".$_GET[bh]."'");
 php_toheader("qiugou.php?bh=".$_GET[bh]);

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
<script language="javascript">
function wyonc(x){
ia=document.getElementById("wyalli").innerHTML
 for(i=1;i<ia;i++){
 document.getElementById("wys"+i).className="wy";	
 }
document.getElementById("wys"+x).className="wy wy1";	
document.getElementById("wylxr"+x).checked=true;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 发布求购信息</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",4,");?>
 <? include("qiugoucap.php");?>
 <script language="javascript">
 document.getElementById("step1").className="l1 l11";
 </script>
 <? if($_GET[action]=="add" || $_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 tjwait();
 f1.action="qiugoulx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="qiugou" name="jvs" />
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
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步")?></li>
 </ul>
 </form>
 
 <? 
 }else{
 while0("id,bh,uid,type1,wylx","fcw_fang where uid='".$_SESSION[FCWuser]."' and id=".$_GET[id]." and type1='求购'");if(!$row=mysql_fetch_array($res)){php_toheader("qiugoulist.php");}
 ?>
 <script language="javascript">
 function tj(){
 tjwait();
 f1.action="qiugoulx.php?control=update&bh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="qiugou" name="jvs" />
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
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","qiugou.php?bh=".$row[bh])?></li>
 </ul>
 </form>

 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>