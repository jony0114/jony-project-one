<?
include("../config/conn.php");
include("../config/function.php");
$control=$_GET[control];

if($control=="chushou"){$fbty="����";}
elseif($control=="chuzu"){$fbty="����";}
elseif($control=="qiugou"){$fbty="��";}
elseif($control=="qiuzu"){$fbty="����";}
else{php_toheader(weburl);}
if(!empty($_SESSION["FCWuser"])){php_toheader($control."lx.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������Ϣ - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function wyonc(x){
ia=document.getElementById("wyalli").innerHTML
 for(i=1;i<ia;i++){
 document.getElementById("wys"+i).className="wy";	
 }
document.getElementById("wys"+x).className="wy wy1";	
document.getElementById("wylxr"+x).checked=true;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
 <ul class="dqwz">
 <li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <strong class="red">����<?=$fbty?>��Ϣ</strong></li>
 </ul>

 <div class="mzcleft">
 <a href="mianzhuce.php?control=chushou" id="mzca1"<? if($control=="chushou"){?> class="a1"<? }?>>��������</a>
 <a href="mianzhuce.php?control=chuzu" id="mzca2"<? if($control=="chuzu"){?> class="a1"<? }?>>��������</a>
 <a href="mianzhuce.php?control=qiugou" id="mzca3"<? if($control=="qiugou"){?> class="a1"<? }?>>������</a>
 <a href="mianzhuce.php?control=qiuzu" id="mzca4"<? if($control=="qiuzu"){?> class="a1"<? }?>>��������</a>
 </div>
 
 <script language="javascript">
 function tj(){
 tjwait();
 f1.action="<?=$control?>lx.php?control=add";
 }
 </script>
 <div class="right">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$control?>" name="jvs" />
 <ul class="uk1">
 <li class="l1">ѡ�����ͣ�</li>
 <li class="l2">
 <? 
 $i=1;
 $xs=$control;
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <span class="wy<? if(1==$i){?> wy1<? }?>" id="wys<?=$i?>" onclick="wyonc(<?=$i?>)">
 <img src="../upload/wylx/<?=$row1[id]?>.jpg" width="80" height="80"  /><br>
 <input name="R1" id="wylxr<?=$i?>" type="radio"<? if($i==1){?> checked="checked"<? }?> value="<?=$row1[name1]?>" /> <?=$row1[name2]?>
 </span>
 <? 
 $i++;
 }
 ?>
 <span id="wyalli" style="display:none;"><?=$i?></span>
 </li>
 </ul>

 <ul class="uk">
 <li class="l1">������ʾ��</li>
 <li class="l21">��⵽��δ��¼�����ǽ������� ��<a href="../reg/" target="_blank" class="red"><strong>��¼</strong></a>�� �Ա���õĹ���Դ��Ϣ��ͬʱ��Ҳ���Ե�����¼���������ť���������¼������Ϣ��</li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��������")?></li>
 </ul>
 
 </form>
 </div>
 
</div>
<? include("../template/bottom.html");?>
</body>
</html>