<?
include("../config/conn.php");
include("../config/function.php");
pagef(" where zt=0 and type1id=58",3,"fcw_news","order by lastsj desc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>房产问答</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
var npage=1; //当前页面
var allpage=<?=$page_count?>; //所有页面
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}
 
function updatePage() {
 if (xmlHttp.readyState == 4) {
  response = xmlHttp.responseText;
  npage=npage+1;
  document.getElementById("main1").innerHTML=document.getElementById("main1").innerHTML+response;
 }
}

function readlist(){
 if(npage>allpage){alert("已经显示所有信息");return false;}
 var url = "read_wd.php?p="+npage;
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}
</script>
</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<div class="hftp box"><div class="d1"><img src="img/wd.gif" /></div></div>

<div class="fcwd box">
<div class="main">

 <div class="d1">房产问答</div>
 <div class="d2">常见问题解答</div>
 <div id="main1">
 </div>
 
 <div class="d5" id="main1more" onclick="readlist()">加载更多<br><img src="img/jianmore.png" width="16" /></div>
 
</div>
</div>

<div class="wdmenu box">
<div class="d1" onclick="gourl('tzznlist_j57v.html')">房产政策</div>
<div class="d2" onclick="gourl('tzznlist_j56v.html')">最新动态</div>
</div>

<? include("template/bottom.php");?>
<script language="javascript">readlist();</script>
</div>
</body>
</html>