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
<title>����Ա��̨</title>
<meta name="keywords" content="����Ա��̨">
<meta name="description" content="����Ա��̨">
<style type="text/css">
body{margin:0;<? if($_GET[ht]=="yes"){?>background-color:#EBF4D8;<? }?>}
ul{margin:0;list-style-type:none;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}
.inp1{float:left;border:#CCCCCC solid 1px;height:33px;padding:0 0 0 5px;font-size:14px;font-family:"Microsoft YaHei",΢���ź�,"MicrosoftJhengHei",����ϸ��,STHeiti,MingLiu;}
</style>
</head>
<body>
<? if(!empty($ty1id)){?>
<select name="da" id="da" class="inp1" style="display:none;" onChange="area2cha()">
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