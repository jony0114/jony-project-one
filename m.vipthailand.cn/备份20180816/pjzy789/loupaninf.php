<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

//������ʼ
if($_GET[control]=="update" && $_POST[jvs]=="loupan"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $tjly=strgb2312(sqlzhuru($_POST[ttjly]),0,250);
 $xqzb=sqlzhuru($_POST[txqzb]);
 $xqzbarr=array("","");
 if(!empty($xqzb)){
 $a=preg_split("/,/",$xqzb);
 for($i=0;$i<count($a);$i++){$xqzbarr[$i]=$a[$i];}
 }
 $ts=str_replace("��",",",$_POST[twytsid]);
 updatetable("fcw_xq",$ses."
			 xqzb='".$xqzb."',
			 xqzb1='".$xqzbarr[0]."',
			 xqzb2='".$xqzbarr[1]."',
			 zbdj=".sqlzhuru($_POST[tzbdj]).",
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 xqadd='".sqlzhuru($_POST[txqadd])."',
			 money1=".$money1.",
			 wytsid='".$ts."',
			 zj='".sqlzhuru($_POST[tzj])."',
			 sfbl='".sqlzhuru($_POST[tsfbl])."',
			 xmxx='".sqlzhuru($_POST[txmxx])."',
			 other1='".sqlzhuru($_POST[tother1])."',
			 other1v='".sqlzhuru($_POST[tother1v])."',
			 njzj='".sqlzhuru($_POST[tnjzj])."',
			 zt=".sqlzhuru($_POST[Rzt]).",
			 ifxj=".sqlzhuru($_POST[R2]).",
			 djl=".sqlzhuru($_POST[tdjl]).",
			 tjly='".$tjly."',
			 xsxh=".sqlzhuru($_POST[txsxh])."
			 where bh='".$bh."'
			 ");
 updatetable("fcw_huxing","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_xqnews","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_xqvideo","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_xqphoto","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_kanfang","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_loupanjob","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_tejia","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 uploadtpnodata(1,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(2,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home2.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(3,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home3.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(4,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home4.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(5,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home5.jpg","allpic",700,400,325,222,"no");
 php_toheader("loupaninf.php?t=suc&bh=".$bh);

}
//�������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script type="text/javascript">
function tj(){
r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="loupaninf.php?bh=<?=$bh?>&control=update";
}
</script>
<script type="text/javascript" src="js/adddate.js" ></script> 

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","loupaninf.php?bh=".$bh);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">��ܰ��ʾ��</li>
 <li class="l21 feng">��������д���ƣ�������¥�̸��õ�չ�ָ��û�</li>
 <li class="l1">¥�����ƣ�</li>
 <li class="l21"><strong class="blue"><?=$xq?></strong> [<a class="green" href="loupanlx.php?bh=<?=$bh?>&action=update">�޸�����</a>]</li>
 <li class="l1">¥�̷���ͼ1��</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺700*400</span></li>
 <? if(is_file($tp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp?>" width="90" height="67" /></li>
 <? }?>

 <? $tp2="../upload/".$userid."/f/".$bh."/home2.jpg";?>
 <li class="l1">¥�̷���ͼ2��</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺700*400</span></li>
 <? if(is_file($tp2)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp2?>" width="90" height="67" /></li>
 <? }?>

 <? $tp3="../upload/".$userid."/f/".$bh."/home3.jpg";?>
 <li class="l1">¥�̷���ͼ3��</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺700*400</span></li>
 <? if(is_file($tp3)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp3?>" width="90" height="67" /></li>
 <? }?>

 <? $tp4="../upload/".$userid."/f/".$bh."/home4.jpg";?>
 <li class="l1">¥�̷���ͼ4��</li>
 <li class="l2"><input type="file" name="inp4" id="inp4" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺700*400</span></li>
 <? if(is_file($tp4)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp4?>" width="90" height="67" /></li>
 <? }?>

 <? $tp5="../upload/".$userid."/f/".$bh."/home5.jpg";?>
 <li class="l1">¥�̷���ͼ5��</li>
 <li class="l2"><input type="file" name="inp5" id="inp5" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">��ѳߴ磺700*400</span></li>
 <? if(is_file($tp5)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp5?>" width="90" height="67" /></li>
 <? }?>

 <li class="l1">��ͼ���꣺</li>
 <li class="l2">
 <input type="text" value="<?=$row[xqzb]?>" class="inp" name="txqzb" /> 
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">�����ȡ</a>]</span>
 </li>
 <li class="l1">�������ŵȼ���</li>
 <li class="l2"><input type="text" value="<?=returnjgdw($row[zbdj],"",15)?>" class="inp" name="tzbdj" /></li>
 <li class="l1">��������</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" class="inp" id="area1" onchange="areacha()">
 <option value="0">δѡ��</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="<?=$row[areaids]?>" />
 <iframe name="fareas" id="fareas" height="50" width="150" border="0" frameborder="0" src="areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">¥�̵�ַ��</li>
 <li class="l2"><input type="text" value="<?=$row[xqadd]?>" size="50" class="inp" name="txqadd" /> </li>
 <li class="l1">�ο����ۣ�</li>
 <li class="l2"><input type="text" value="<?=$row[money1]?>" size="10" class="inp" name="tmoney1" /> <span class="fd">Ԫ/ƽ�� (�粻ȷ�������ջ���0)</span></li>
 <li class="l1">�ܼۣ�</li>
 <li class="l2"><input type="text" value="<?=$row[zj]?>" size="10" class="inp" name="tzj" /></li>
 <li class="l1">�׸�������</li>
 <li class="l2"><input type="text" value="<?=$row[sfbl]?>" size="10" class="inp" name="tsfbl" /></li>
 <li class="l1">������</li>
 <li class="l2"><input type="text" value="<?=$row[njzj]?>" size="10" class="inp" name="tnjzj" /></li>
 <li class="l1">������Ϣ��</li>
 <li class="l2">
 <input type="text" value="<?=$row[other1]?>" size="10" class="inp" name="tother1" /><span class="fd"></span>
 <input type="text" value="<?=$row[other1v]?>" size="10" class="inp" name="tother1v" />
 </li>
 <li class="l41">��Ŀ��Ϣ��</li>
 <li class="l51"><textarea name="txmxx"><?=$row[xmxx]?></textarea><span class="fd"> һ��һ��</span></li>
 <li class="l1">��ҵ��ɫ��</li>
 <li class="l2"><input type="text" value="<?=$row[wytsid]?>" size="80" class="inp" name="twytsid" /><span class="fd">�����ɫ�ö���,����</span></li>
 </ul>
 
 <ul class="uk uk0">
 <li class="l1">�ϼ�״̬��</li>
 <li class="l2">
 <label><input name="R2" type="radio"<? if(0==$row[ifxj]){?> checked="checked"<? }?> value="0" /> ����չʾ</label>
 <label><input name="R2" type="radio"<? if(1==$row[ifxj]){?> checked="checked"<? }?> value="1" /> �¼�(ע���¼ܺ�¥�̽�������ʾ����վ��)</label>
 </li>
 <li class="l1">¥����ɫ��</li>
 <li class="l2"><input type="text" value="<?=$row[tjly]?>" size="100" class="inp" name="ttjly" /> </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��ע�ȣ�</li>
 <li class="l2"><input type="text" value="<?=$row[djl]?>" class="inp" size="5" name="tdjl" /></li>
 <li class="l1">��ʾ˳��</li>
 <li class="l2">
 <input type="text" value="<?=returnjgdw($row[xsxh],"",9999)?>" class="inp" size="5" name="txsxh" />
 <span class="fd">Ĭ��Ϊ9999������С�����˳����ʾ��¥���б���</span>
 </li>
 <li class="l1">������Ա��</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>����չʾ</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>�������</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>��˲�ͨ��</strong></label>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script language="javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>