<?php
require("../config/conn.php");
require("../config/function.php");
$ty1id=$_GET[ty1id];
$ty2id=$_GET[ty2id];
$ty1name=returnarea(1,$ty1id);
$ty2name=returnarea(2,$ty2id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
</style>
</head>
<body>
<? if(!empty($ty1id) && !empty($ty2id)){?>
<select name="da" id="da" style="display:none;" onchange="area3cha()">
<? $ejh=0;while1("*","fcw_area where admin=3 and name1='".$ty1name."' and name2='".$ty2name."' order by xh asc");while($row1=mysql_fetch_array($res1)){$ejh=1;?>
<option value="<?=$row1[id]?>" <? if(intval($_GET[nid])==$row1[id]){?>selected="selected"<? }?>><?=$row1[py]." - ".$row1[name3]?></option>
<? }?>
</select>
<? }?>
<script language="javascript">
function area3cha(){
 if(document.getElementById("da").value!=""){
 parent.document.getElementById("area3").value=document.getElementById("da").value;
 }
}
<? if($ejh==0){?>
parent.document.getElementById("fareas3").style.display="none";parent.document.getElementById("area3").value=0;
<? }else{?>document.getElementById("da").style.display="";area3cha();<? }?>
</script>
</body>
</html>