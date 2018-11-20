<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(3!=$_SESSION[FCWuserID]){Audit_alert("错误的路径来源！","./");}

//函数开始
if($_GET[control]=="add"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $userid=returnuserid($_SESSION[FCWuser]);
 $bh=time()."jc".$userid;
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_jia_jc","uid,type1id,type2id,type3id,mytype1id,mytype2id,djl,sj,lastsj,uip,bh,zt,ifxj,mytj,money1","'".$_SESSION[FCWuser]."',".sqlzhuru($_POST[type1id]).",".sqlzhuru($_POST[type2id]).",".sqlzhuru($_POST[type3id]).",0,0,0,'".$sj."','".$sj."','".$uip."','".$bh."',99,0,0,0");
 php_toheader("jc.php?bh=".$bh); 
 

}elseif($_GET[control]=="update"){
 $bh=$_GET[bh];
 updatetable("fcw_jia_jc","type1id=".sqlzhuru($_POST[type1id]).",type2id=".sqlzhuru($_POST[type2id]).",type3id=".sqlzhuru($_POST[type3id])." where uid='".$_SESSION[FCWuser]."' and bh='".$bh."'");
 php_toheader("jc.php?bh=".$bh); 

}
//函数结束

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="../css/pty.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/pty.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 宝贝管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",10,");?>
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>

 <!--新增开始-->
 <? if($_GET[action]!="update"){?>
 <form name="f1" method="post" onsubmit="return tjadd(0)">
 <input type="hidden" name="type1id" value="0" />
 <input type="hidden" name="type2id" value="0" />
 <input type="hidden" name="type3id" value="0" />
 <div class="productlx">
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
 <div class="fb"><input type="submit" value="立即发布" /></div>
 </div>
 </form>
 <!--新增结束-->
   
 <!--修改开始-->
 <? 
 }elseif($_GET[action]=="update"){
 $bh=$_GET[bh];
 while0("*","fcw_jia_jc where uid='".$_SESSION[FCWuser]."' and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("jclist.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tjupdate('<?=$bh?>')">
 <input type="hidden" name="type1id" value="<?=$row[type1id]?>" />
 <input type="hidden" name="type2id" value="<?=$row[type2id]?>" />
 <input type="hidden" name="type3id" value="<?=$row[type3id]?>" />
 <div class="productlx">
  
 <div class="sel">
 <strong>您当前选择的是：</strong>
 <span id="type1name"><?=returnjcty(1,$row[type1id])?> >> </span>
 <span id="type2name"><?=returnjcty(2,$row[type2id])?> >> </span>
 <span id="type3name"><?=returnjcty(3,$row[type3id])?></span>
 </div>
 
 <div class="ptype">
 <a href="javascript:void(0);" class="a1">选择分类 <img border="0" src="../img/icon3.gif" width="7" height="4" /></a>
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
 <!--修改结束-->

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>