<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
while0("*","fcw_fang where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("./");}
if($row[type1]=="����"){$tyurl="chushou";}
elseif($row[type1]=="����"){$tyurl="chuzu";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/fang.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function add1(){
layer.open({
  type: 2,
  area: ['622px', '270px'],
  shadeClose: true,
  title:["��Դ������¼","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['fanggjlx.php?bh=<?=$bh?>', 'no'] 
});
}
function upd1(x){
layer.open({
  type: 2,
  area: ['622px', '270px'],
  shadeClose: true,
  title:["��Դ������¼","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['fanggjtxt.php?bh=<?=$bh?>&mybh='+x, 'no'] 
});
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
fcwcheckDEL(29,'fcw_fanggj');
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Դ������¼</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <div class="rmenucap">
 <a href="<?=$tyurl?>.php?bh=<?=$bh?>">��Դ��Ϣ</a>
 <a href="fanggj.php?bh=<?=$bh?>" class="a1">������¼</a>
 </div>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(29,'fcw_fanggj')" class="a1">ɾ��</a>
 <a href="javascript:;" onclick="add1()" class="a2">��Ӹ�����Ϣ</a>
 </li>
 </ul>

 <ul class="fanggjcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">������Ϣ</li>
 <li class="l3">Ա��</li>
 <li class="l4">ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <? while1("*","fcw_fanggj where fangbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="fanggjlist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>" /></li>
 <li class="l2" onclick="upd1('<?=$row1[mybh]?>')"><?=$row1[txt]?></li>
 <li class="l3"><?=returnuname(returnuser($row1[fbuserid]))?></li>
 <li class="l4"><?=dateYMD($row1[sj])?></li>
 <li class="l5" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="upd1('<?=$row1[mybh]?>')">�޸���Ϣ</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">ɾ����Ϣ</a>
  </div>
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>