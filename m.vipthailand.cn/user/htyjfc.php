<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while0("*","fcw_hetong where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("hetonglist.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/oa.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function add1(){
layer.open({
  type: 2,
  area: ['322px', '410px'],
  shadeClose: true,
  title:["Ӷ��ֳɹ���","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['htyjfclx.php?bh=<?=$bh?>', 'no'] 
});
}
function upd1(x){
layer.open({
  type: 2,
  area: ['322px', '410px'],
  shadeClose: true,
  title:["Ӷ��ֳɹ���","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['htyjfctxt.php?bh=<?=$bh?>&mybh='+x, 'no'] 
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
fcwcheckDEL(28,'fcw_htyjfc');
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��ͬӶ��ֳ�</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap15.php");?>
 <? include("htmenu.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 document.getElementById("rmenu3").className="a1";
 </script>

 <?
 $shou=0;
 $zhi=0;
 while1("*","fcw_htcaiwu where htbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){
 $shou=$shou+$row1[money1ok];
 $zhi=$zhi+$row1[money2ok];
 }
 ?>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(28,'fcw_htyjfc')" class="a1">ɾ��</a>
 <a href="javascript:;" onclick="add1()" class="a2">���Ӷ��ֳ�</a>
 </li>
 <li class="l3"><span class="s1">����ͬ��Ӷ��<strong class="red"><?=$shou-$zhi?></strong>Ԫ</span></li>
 </ul>

 <ul class="htyjfccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">����</li>
 <li class="l3">����</li>
 <li class="l4">Ա��</li>
 <li class="l5">�ֳɱ���</li>
 <li class="l6">Ӧ��ҵ��</li>
 <li class="l7">ʵ��ҵ��</li>
 <li class="l8">�ֳ�˵��</li>
 <li class="l9">����</li>
 </ul>
 <? 
 while1("*","fcw_htyjfc where htbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){
 ?>
 <ul class="htyjfclist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>" /></li>
 <li class="l2"><?=dateYMD($row1[sj])?></li>
 <li class="l3"><?=$row1[yggs]?></li>
 <li class="l4"><?=$row1[yg]?></li>
 <li class="l5"><?=$row1[fcbl]?>%</li>
 <li class="l6"><?=$row1[money1]?></li>
 <li class="l7"><?=$row1[money1ok]?></li>
 <li class="l8"><?=returntitdian($row1[txt],16)?></li>
 <li class="l9" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
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