<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $qx=",10,";
 while1("id,uid,qx","fcw_user where uid='".sqlzhuru($_POST[t1])."' and usertype=3 and qx like '%".$qx."%'");
 if(!$row1=mysql_fetch_array($res1)){Audit_alert("会员验证有误！","jclx.php");}
 $sj=date("Y-m-d H:i:s");
 $userid=returnuserid(sqlzhuru($_POST[t1]));
 $bh=time()."jc".$userid;
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_jia_jc","uid,type1id,type2id,type3id,mytype1id,mytype2id,djl,sj,lastsj,uip,bh,zt,ifxj,mytj,money1","'".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[type1id]).",".sqlzhuru($_POST[type2id]).",".sqlzhuru($_POST[type3id]).",0,0,0,'".$sj."','".$sj."','".$uip."','".$bh."',99,0,0,0");
 php_toheader("jc.php?bh=".$bh); 
 

}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 $bh=$_GET[bh];
 updatetable("fcw_jia_jc","type1id=".sqlzhuru($_POST[type1id]).",type2id=".sqlzhuru($_POST[type2id]).",type3id=".sqlzhuru($_POST[type3id])." where bh='".$bh."'");
 php_toheader("jc.php?bh=".$bh); 

}
//函数结束
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="../css/pty.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="../js/pty.js"></script>
<script language="javascript">
function uidsel(){
document.f1.t1.value=document.f1.d1.value;	
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
 <? $leftid=1;include("menu_jia.php");?>

<div class="right">

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">发布建材商品</a>
 <a href="jclist.php">返回列表</a>
 </div> 

 <!--新增开始-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <form name="f1" method="post" onsubmit="return tjadd(1)">
 <input type="hidden" name="type1id" value="0" />
 <input type="hidden" name="type2id" value="0" />
 <input type="hidden" name="type3id" value="0" />
 <div class="productlx" style="margin:20px 0 20px 20px;">
 <div class="sel">
 <strong>选择宝贝类别：</strong>
 <span id="type1name"></span>
 <span id="type2name"></span>
 <span id="type3name"></span>
 </div>
 <div class="ptype">
 <a href="javascript:void(0);" class="a1">选择分类 <img border="0" src="../img/icon3.png" width="7" height="4" /></a>
 <? while1("*","fcw_jia_jctype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="javascript:typeonc(<?=$row1[id]?>,'<?=$row1[type1]?>')" class="a2"><?=$row1[type1]?></a>
 <? }?>
 </div>
 <div class="ptype">
 <iframe name="ptype2" id="ptype2" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src=""></iframe>
 </div>
 <div class="ptype">
 <iframe name="ptype3" id="ptype3" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src=""></iframe>
 </div>
 
 <ul class="uk">
 <li class="l1">选择会员：</li>
 <li class="l2">
 <input name="t1" size="30" type="text" class="inp" onfocus="inpf(this)" onblur="inpb(this)" />
 <select name="d1" onchange="uidsel()" class="inp" style="margin-left:10px;">
 <option value="">最近使用</option>
 <? while1("uid,company,adminczsj","fcw_user where usertype=3 order by adminczsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[uid]?>"><?=$row1[uid]." ".$row1[company]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">友情提示：</li>
 <li class="l21 red">发布家居建材必须选择建材商帐号才能发布</li>
 </ul>

 <div class="fb"><input type="submit" value="立即发布" /></div>
 </div>
 </form>
 <!--新增结束-->
   
 <!--修改开始-->
 <? 
 }elseif($_GET[action]=="update"){
 $bh=$_GET[bh];
 while0("*","fcw_jia_jc where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("jclist.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tjupdate('<?=$bh?>')">
 <input type="hidden" name="type1id" value="<?=$row[type1id]?>" />
 <input type="hidden" name="type2id" value="<?=$row[type2id]?>" />
 <input type="hidden" name="type3id" value="<?=$row[type3id]?>" />
 <div class="productlx" style="margin:20px 0 20px 20px;">
  
 <div class="sel">
 <strong>您当前选择的是：</strong>
 <span id="type1name"><?=returnjcty(1,$row[type1id])?> >> </span>
 <span id="type2name"><?=returnjcty(2,$row[type2id])?> >> </span>
 <span id="type3name"><?=returnjcty(3,$row[type3id])?></span>
 </div>
 
 <div class="ptype">
 <a href="javascript:void(0);" class="a1">选择分类 <img border="0" src="../img/icon3.png" width="7" height="4" /></a>
 <? while1("*","fcw_jia_jctype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="javascript:typeonc(<?=$row1[id]?>,'<?=$row1[type1]?>')" class="a2"><?=$row1[type1]?></a>
 <? }?>
 </div>
  
 <div class="ptype">
 <iframe name="ptype2" id="ptype2" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../template/jctype2.php?type1id=<?=$row[type1id]?>"></iframe>
 </div>
  
 <div class="ptype">
 <iframe name="ptype3" id="ptype3" marginwidth="1" scrolling="no" marginheight="1" height="100%" width="100%" border="0" frameborder="0" src="../template/jctype3.php?type1id=<?=$row[type1id]?>&type2id=<?=$row[type2id]?>"></iframe>
 </div>

 <div class="fb"><input type="submit" value="保存修改" /></div>
  
 </div>
 </form>
 <? }?>
 </div>
 <!--修改结束-->

</div>
</div>
<?php include("bottom.php");?>
</body>
</html>