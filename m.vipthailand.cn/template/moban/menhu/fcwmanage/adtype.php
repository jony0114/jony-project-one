<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu6").className="a1";
</script>
<div class="yjcode">
 <? $leftid=1;include("menu_ad.php");?>

<div class="right">

 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>
 
 <? include("rightcap4.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>

 <!--begin-->
 <ul class="adtypecap">
 <li class="l1">��涨λ���</li>
 <li class="l2">˵��</li>
 <li class="l3">����</li>
 </ul>
 
 <?
 $adbh=array("ADDL","ADI01","menuhu_ADI01","ADI05","ADI06","ADI07","ADI08","ADI14","menhu_ADI02","menhu_ADI03","menhu_ADI04","menhu_ADI05","menhu_ADI06","menhu_ADI07","menhu_ADI08","menhu_ADI09","menhu_ADI10","menhu_ADI11","menhu_ADI12","menhu_ADI13","defaultI01","defaultI02","defaultI03","ADKF");
 $adtit=array("�������","��ҳ�������","��ҳƷ���̼�","�����м�����","��ҳ�ײ��������","��ҳ��������","��ҳ¥���Ϸ����","��ҳ��Դ�Ϸ����","�Ż����Ϲ��","�������м�","������","���������","�����Ҳ���","����LOGO�Ҳ���","������װ�����غ�Ĺ��","��ҳ�л�","�Ż��Ϸ����","��Ѷ�Ϸ����","��ҳ�����Ϸ����","��ҳ��ҵ�����¹��","��ҳ��װ���л�","��ҳ��װ�л��·�������","��ҳ��װ�л��Ҳ���","�Ҳ��Զ���ͷ�");
 $adsize=array("100*?","1200*?","160*100","","100*35","","1200*?","1200*?","269*195","730*70","","165*125","165*125","665*70","178*40","270*173","1200*?","1200*?","1200*?","270*100","720*280","239*100","208*387","");
 $admust=array("pic","","","font","pic","font","","","","","font","","","","","pic","","","","","pic","","","code");
 
 for($i=0;$i<count($adbh);$i++){
 $adurl="adlist.php?bh=".$adbh[$i]."&sm=".urlencode($adtit[$i]."-".$adsize[$i])."&must=".$admust[$i];
 ?>
 <ul class="adtypelist">
 <li class="l1" onclick="gourl('<?=$adurl?>')"><?=$adbh[$i]?></li>
 <li class="l2"><?=$adtit[$i]." ".$adsize[$i]?></li>
 <li class="l3">
 <a href="<?=$adurl?>">�б�</a><span></span>
 <a href="ad.php?bh=<?=$adbh[$i]?>&sm=<?=urlencode($adtit[$i]."-".$adsize[$i])?>&must=<?=$admust[$i]?>">����</a>
 </li>
 </ul>
 <?
 }
 ?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>