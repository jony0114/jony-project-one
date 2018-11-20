<?php
require("../config/conn.php");
require("../config/function.php");
$areaid=$_GET[areaid];
$mid=$_GET[mid];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>商圈选择</title>
<style type="text/css">
body{margin:0;}
ul{margin:0;list-style-type:none;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}
.inp{float:left;height:27px;border:#B6B7C9 solid 1px;border-radius:2px;font-size:14px;padding:9px 0 0 5px;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;background:url(img/inpbg.gif) left top repeat-x;}
@media screen and (-webkit-min-device-pixel-ratio:0) {
.inp{padding:0 0 0 5px;height:36px;}
}
</style>
</head>
<body>
<select name="sq" class="inp" id="sq" onChange="sqcha()">
<option value="0">无</option>
<? while1("*","fcw_shangquan where zt=0 and areaid=".$areaid." order by py asc");while($row1=mysql_fetch_array($res1)){?>
<option value="<?=$row1[id]?>" <? if(intval($mid)==$row1[id]){?>selected="selected"<? }?>><?=$row1[py]." - ".$row1[tit]?></option>
<? }?>
</select>
<script language="javascript">
function sqcha(){
parent.document.getElementById("sqid").value=document.getElementById("sq").value;
}
sqcha();
</script>
</body>
</html>