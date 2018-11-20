<?php
include("../config/conn.php");
include("../config/function.php");

$type1id=$_GET[type1id];
$type2id=$_GET[type2id];
if(!is_numeric($type1id)){$type1id=0;}
if(!is_numeric($type2id)){$type2id=0;}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>选择商品分类</title>
<link href="../css/pty.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function type3cx(a,b){
parent.$("type3name").innerHTML=a;
parent.document.f1.type3id.value=b;
}
</script>
</head>
<body>

 <? 
 if($type2id!=0){
 $type1name=returnjcty(1,$type1id);
 $type2name=returnjcty(2,$type2id);
 ?>
 <!--begin-->
 <div class="ptype2">
 <a href="javascript:void(0);" class="a1"><?=$type2name?> <img border="0" src="../img/icon3.png" width="7" height="4" /></a>
 <? while0("*","fcw_jia_jctype where admin=3 and type1='".$type1name."' and type2='".$type2name."' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="javascript:type3cx('<?=$row[type3]?>',<?=$row[id]?>);" class="a2"><?=$row[type3]?></a>
 <? }?>
 </div>
 <!--end-->
 <? }?>
 
</body>
</html>