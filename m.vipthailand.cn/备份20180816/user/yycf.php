<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[FCWuser]);
$sj=date("Y-m-d H:i:s");

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

$fid=$_GET[fid];
while0("*","fcw_fang where id=".$fid);$row=mysql_fetch_array($res);
$type1=$row[type1];
if($row[type1]=="����"){$u="chushoulist.php";}
elseif($row[type1]=="����"){$u="chuzulist.php";}

if($_POST[fah]!=""){
 $fah=intval($_POST[fah]);
 $fid=intval($_POST[fid]);
 $tianshu=intval($_POST[tianshu]);
 deletetable("fcw_cflist where userid=".$userid." and fid=".$fid."");
 if($fah!=0){ //Ԥ�跽��
 
  if(intval($_POST[R1])==0){Audit_alert("��ѡ��һ���ط�����","yycf.php?fid=".$fid);}
  while1("*","fcw_chongfa where userid=".$userid." and ty1id=".$fah." order by xh asc");while($row1=mysql_fetch_array($res1)){
   for($i=0;$i<$tianshu;$i++){
   $bh=time()."a-".$i."-".$row1[id];
   $s=date("Y-m-d H:i:s",strtotime("+".$i." day"));
   $sjv=dateYMD($s)." ".$row1[sj1].":".$row1[sj2].":00";
   intotable("fcw_cflist","bh,userid,fid,sj,ifok,type1","'".$bh."',".$userid.",".$fid.",'".$sjv."',0,'".$type1."'");
   }
  }
  Audit_alert("��ϲ����ԤԼ�ط������ύ�ɹ�","yycf.php?fid=".$fid);
 
 }else{ //�Զ��巽��
  for($i=0;$i<$tianshu;$i++){
   for($j=1;$j<=10;$j++){
   $s=$_POST["s_1_".$j];
   $f=$_POST["f_1_".$j];
   if(!empty($s) && !empty($f)){
    $bh=time()."z-".$i."-".$j;
    $s1=date("Y-m-d H:i:s",strtotime("+".$i." day"));
    $sjv=dateYMD($s1)." ".$s.":".$f.":00";
    intotable("fcw_cflist","bh,userid,fid,sj,ifok,type1","'".$bh."',".$userid.",".$fid.",'".$sjv."',0,'".$type1."'");
   }
   }
  }
  Audit_alert("��ϲ�����ط������ύ�ɹ�","yycf.php?fid=".$fid);
 
 }
 
}

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
function faonc(x){
document.f1.fah.value=x;
if(x==0){document.getElementById("cffa").style.display="";}else{document.getElementById("cffa").style.display="none";}
}

function tj(){
document.f1.submit();
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �Զ��ط�</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",3,");?>

 <div class="cfts">
VIP�û�����ֵ���񣬿���Ϊ��ÿ�ո���ʱ����Զ��ط����������趨�ķ�Դ��Ϣ���������������Ϣ��ʱ��Ҳ�������ķ�Դ�Զ�չʾ����һҳ������������N�������˵��Զ���Դ��Ϣ��Ҫ�ط��������������ĩλ�ã� ����˵���� <br>
1����������������ԤԼ������10��ʱ�����Ԥ�跢��ʱ�䣬������ԤԼ����N����ԴԤԼ��<br> 
2����Ҳ�����Զ���ʱ�������ʱ����ԤԼ <br>
3���ر����ѣ�Ԥ���ط��������������տɷ������п۳���������ԭ���п��ܻ�ʹԤԼʱ��˳��һ�������ң������½�<br>
 </div>
 
 <form name="f1" method="post">
 <input type="hidden" value="0" name="fah" />
 <input type="hidden" value="<?=$fid?>" name="fid" />
 <div class="yycf">
  <div class="d0"><?=$row[tit]?></div>
  <ul class="u1">
  <li class="l1">ѡ��ԤԼ�ط�����</li>
  <li class="l2">
  <label><input name="R1" type="radio" onclick="faonc(0)" value="0" checked="checked" /> �Զ���</label>
  <label><input name="R1" type="radio" onclick="faonc(1)" value="1" /> ����һ</label>
  <label><input name="R1" type="radio" onclick="faonc(2)" value="2" /> ������</label>
  <label><input name="R1" type="radio" onclick="faonc(3)" value="3" /> ������</label>
  <label><input name="R1" type="radio" onclick="faonc(4)" value="4" /> ������</label>
  </li>
  <li class="l3">
  <a href="chongfa.php"><img border="0" src="img/b3.gif" width="129" height="41" /></a>
  </li>
  </ul>
 </div>
 
 <div class="cffa">
 
  <div id="cffa">
  <? 
  for($j=1;$j<=10;$j++){
  ?>
  <div class="d1">
   <div class="ds1"><?=$j?>.</div>
   <div class="ds2">
   <select style="font-size:18px;font-weight:700;" name="s_1_<?=$j?>">
   <option value="">--</option>
   <? for($i=1;$i<=23;$i++){?>
   <option value="<?=$i?>"<? if($s==$i){?> selected="selected"<? }?>><?=$i?></option>
   <? }?>
   </select>
   </div>
   <div class="ds3">��</div>
   <div class="ds4">
   <select style="font-size:18px;font-weight:700;" name="f_1_<?=$j?>">
   <option value="">--</option>
   <? for($i=0;$i<=59;$i++){?>
   <option value="<?=$i?>"><?=$i?></option>
   <? }?>
   </select>
   </div>
  </div>
  <? }?>
  </div>
  
  <div class="d2">
  ����ԤԼ�ط����ռ�����Ч����ѡ��ִ��������
  <select name="tianshu">
  <option value="1">����</option>
  <option value="3">����</option>
  <option value="5">����</option>
  <option value="10">ʮ��</option>
  <option value="15">ʮ����</option>
  <option value="30">��ʮ��</option>
  </select>
  </div>
  
  <div class="b">
  <input type="image" onclick="tj()" src="img/b4.gif" width="95" height="41" style="margin:0 10px;" border="0" />
  </div>
  
 </div>
 </form>


</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>