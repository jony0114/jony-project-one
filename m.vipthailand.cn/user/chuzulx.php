<?
include("../config/conn.php");
include("../config/function.php");
include("mzcreg.php");
//�޸ĸ��ļ���Ҫͬ���޸�fcwmange/chuzulx.php�Լ��ֻ����
sesCheck();

//��������ʼ
if($_GET[control]=="add"){
 zwzr();
 while1("id,nc,mot,uid,zjuid,userdj","fcw_user where uid='".$_SESSION[FCWuser]."' and (usertype=1 or usertype=2)");if(!$row1=mysql_fetch_array($res1)){Audit_alert("��Ա��֤����","chuzulx.php");}
 $sj=date("Y-m-d H:i:s");
 //�жϷ����Ƿ���B
 $djfb=0;
 while2("*","fcw_userdj where id=".returnuserdj($row1[id]));if($row2=mysql_fetch_array($res2)){$djfb=$row2[fyfb];}
 $time1 = dateYMD($sj)." 00:00:00";
 $time2 = dateYMD($sj)." 23:59:59";
 $a=returncount("fcw_fang where uid='".$row1[uid]."' and (type1='����' or type1='����') and (zt=0 or zt=1) and fbsj between '".$time1."' and '".$time2."'");
 if($a>=$djfb){Audit_alert("��ã������շ�Դ�������������꣬��������Ա�ȼ���","userdj.php");}
 //�жϷ����Ƿ���E
 $bh=time()."f".$row1[id];
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_fang","bh,uid,fbsj,sj,uip,type1,fbty,djl,wylx,ifok,ifxj,zt,czfs,mytj,zjuid,zdxh","'".$bh."','".$_SESSION[FCWuser]."','".$sj."','".$sj."','".$uip."','����',".$_SESSION[FCWuserID].",1,'".sqlzhuru($_POST[R1])."',0,0,99,1,0,'".$row1[zjuid]."',0");
 php_toheader("chuzu.php?bh=".$bh);

}elseif($_GET[control]=="update"){
 zwzr();
 updatetable("fcw_fang","wylx='".sqlzhuru($_POST[R1])."' where uid='".$_SESSION[FCWuser]."' and type1='����' and bh='".$_GET[bh]."'");
 php_toheader("chuzu.php?bh=".$_GET[bh]);

}
//����������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ����������Ϣ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",2,");?>
 <? include("chuzucap.php");?>
 <script language="javascript">
 document.getElementById("step1").className="l1 l11";
 </script>
 <? if($_GET[action]=="add" || $_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 tjwait();
 f1.action="chuzulx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="chuzu" name="jvs" />
 <ul class="uk1">
 <li class="l1">��Ҫ���⣺</li>
 <li class="l2">
 <? 
 $i=1;
 $xs="chuzu";
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
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��")?></li>
 </ul>
 </form>
 
 <? 
 }else{
 while0("id,bh,uid,type1,wylx","fcw_fang where uid='".$_SESSION[FCWuser]."' and id=".$_GET[id]." and type1='����'");if(!$row=mysql_fetch_array($res)){php_toheader("chuzulist.php");}
 ?>
 <script language="javascript">
 function tj(){
 tjwait();
 f1.action="chuzulx.php?control=update&bh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="chuzu" name="jvs" />
 <ul class="uk1">
 <li class="l1">��Ҫ���⣺</li>
 <li class="l2">
 <? 
 $i=1;
 $xs="chuzu";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <span class="wy<? if($row1[name1]==$row[wylx]){?> wy1<? }?>" id="wys<?=$i?>" onclick="wyonc(<?=$i?>)">
 <img src="../upload/wylx/<?=$row1[id]?>.jpg" width="80" height="80"  /><br>
 <input name="R1" id="wylxr<?=$i?>" type="radio"<? if($row1[name1]==$row[wylx]){?> checked="checked"<? }?> value="<?=$row1[name1]?>" /> <?=$row1[name2]?>
 </span>
 <? 
 $i++;
 }
 ?>
 <span id="wyalli" style="display:none;"><?=$i?></span>
 </li>
 </ul>
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","chuzu.php?bh=".$row[bh])?></li>
 </ul>
 </form>

 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>