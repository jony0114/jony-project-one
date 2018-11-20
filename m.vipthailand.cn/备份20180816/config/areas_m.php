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
<title>小区域</title>
<style type="text/css">
body{margin:0;}
ul{margin:0;list-style-type:none;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}
input,select{outline: medium none;}
</style>
</head>
<body>
<? if(!empty($ty1id)){?>
<select name="da" id="da" style="font-size:13px;border:0;width:120%;background-color:transparent;" onChange="area2cha()">
<? $ejh=0;while1("*","fcw_area where admin=2 and name1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){$ejh=1;?>
<option value="<?=$row1[id]?>" <? if(intval($_GET[nid])==$row1[id]){?>selected="selected"<? }?>><?=$row1[py]." - ".$row1[name2]?></option>
<? }?>
</select>
<? }?>
<script language="javascript">
function area2cha(){
 parent.document.getElementById("area2").value=document.getElementById("da").value;
}
<? if($ejh==0){?>parent.document.getElementById("areaids_m").style.display="none";<? }else{?>parent.document.getElementById("areaids_m").style.display="";<? }?>
<? if(!empty($ty1id)){?>area2cha();<? }?>
</script>
</body>
</html>