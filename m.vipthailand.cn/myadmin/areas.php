<?php
require("../config/conn.php");
require("../config/function.php");
$ty1id=$_GET[id];
$ty1name=returnarea(1,$ty1id);
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员后台</title>
<meta name="keywords" content="管理员后台">
<meta name="description" content="管理员后台">
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
<? if(!empty($ty1id)){?>
<select name="da" id="da" class="inp" style="display:none;" onChange="area2cha()">
<? $ejh=0;while1("*","fcw_area where admin=2 and name1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){$ejh=1;?>
<option value="<?=$row1[id]?>" <? if(intval($_GET[nid])==$row1[id]){?>selected="selected"<? }?>><?=$row1[py]." - ".$row1[name2]?></option>
<? }?>
</select>
<? }?>
<script language="javascript">
function area2cha(){
 if(document.getElementById("da").value!=""){
 parent.document.getElementById("area2").value=document.getElementById("da").value;
 }
}
<? if($ejh==0){?>parent.document.getElementById("fareas").style.display="none";<? }else{?>document.getElementById("da").style.display="";<? }?>
<? if(!empty($ty1id)){?>area2cha();<? }?>
</script>
</body>
</html>