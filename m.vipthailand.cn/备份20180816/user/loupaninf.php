<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}
//������ʼ
if($_GET[control]=="update" && $_POST[jvs]=="loupan"){
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $xqzb=sqlzhuru($_POST[txqzb]);
 $xqzbarr=array("","");
 if(!empty($xqzb)){
 $a=preg_split("/,/",$xqzb);
 for($i=0;$i<count($a);$i++){$xqzbarr[$i]=$a[$i];}
 }
 updatetable("fcw_xq","
			 xqzb='".$xqzb."',
			 xqzb1='".$xqzbarr[0]."',
			 xqzb2='".$xqzbarr[1]."',
			 zbdj=".sqlzhuru($_POST[tzbdj]).",
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 xqadd='".sqlzhuru($_POST[txqadd])."',
			 money1=".$money1.",
			 wylx='".$_GET[wy]."',
			 wytsid='".$_GET[ts]."',
			 sltel='".sqlzhuru($_POST[tsltel])."',
			 sladd='".sqlzhuru($_POST[tsladd])."',
			 kpsj='".sqlzhuru($_POST[tkpsj])."',
			 rzsj='".sqlzhuru($_POST[trzsj])."',
			 ysxkz='".sqlzhuru($_POST[tysxkz])."',
			 cq='".sqlzhuru($_POST[tcq])."',
			 kfs='".sqlzhuru($_POST[tkfs])."',
			 jzlb='".sqlzhuru($_POST[tjzlb])."',
			 zdmj='".sqlzhuru($_POST[tzdmj])."',
			 jzmj='".sqlzhuru($_POST[tjzmj])."',
			 zhs='".sqlzhuru($_POST[tzhs])."',
			 rjl='".sqlzhuru($_POST[trjl])."',
			 lhl='".sqlzhuru($_POST[tlhl])."',
			 wyf='".sqlzhuru($_POST[twyf])."',
			 wygs='".sqlzhuru($_POST[twygs])."',
			 wsfw='".sqlzhuru($_POST[twsfw])."',
			 xqrk='".sqlzhuru($_POST[txqrk])."',
			 tcw='".sqlzhuru($_POST[ttcw])."',
			 lpzt=".sqlzhuru($_POST[R1]).",
			 zt=".$zt.",
			 ifxj=".sqlzhuru($_POST[R2]).",
			 zygw='".sqlzhuru($_POST[tzygw])."',
			 vrurl='".sqlzhuru($_POST[tvrurl])."'
			 where uid='".$_SESSION[FCWuser]."' and bh='".$bh."'
			 ");
 updatetable("fcw_huxing","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 updatetable("fcw_xqnews","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 updatetable("fcw_xqvideo","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 updatetable("fcw_xqphoto","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 updatetable("fcw_kanfang","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 uploadtpnodata(1,"upload/".$userid."/f/".$bh."/","home.jpg","allpic",180,120,325,222,"no");
 php_toheader("loupaninf.php?t=suc&bh=".$bh);

}
//�������
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
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
c=document.getElementsByName("C1");
str="xcf";for(i=0;i<c.length;i++){if(c[i].checked==true){str=str+c[i].value+"xcf";}}
c11=document.getElementsByName("C11");str1="xcf";for(i=0;i<c11.length;i++){if(c11[i].checked){str1=str1+c11[i].value+"xcf";}}
tjwait();
f1.action="loupaninf.php?bh=<?=$bh?>&control=update&wy="+str+"&ts="+str1;
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ¥�̹���</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","loupaninf.php?bh=".$bh)?>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">��ܰ��ʾ��</li>
 <li class="l21 feng">��������д���ƣ�������¥�̸��õ�չ�ָ��û�</li>
 <li class="l1">¥�����ƣ�</li>
 <li class="l21"><strong class="blue" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;"><?=$row[xq]?></strong>  [<a class="green" href="loupanlx.php?bh=<?=$bh?>&action=update">�޸�����</a>]</li>
 <li class="l1">¥�̷���ͼ��</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"> ��ѳߴ磺325*222</li>
 <li class="l5"></li>
 <li class="l6"><img src="<?=$tp?>" width="100" height="100" /></li>
 <li class="l1">��ͼ���꣺</li>
 <li class="l2">
 <input type="text" value="<?=$row[xqzb]?>" class="inp" name="txqzb" /> 
 <span class="fd fd1">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">�����ȡ</a>]</span>
 </li>
 <li class="l1">�������ŵȼ���</li>
 <li class="l2"><input type="text" value="<?=returnjgdw($row[zbdj],"",15)?>" class="inp" name="tzbdj" /></li>
 <li class="l1">��������</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" onchange="areacha()">
 <option value="0">δѡ��</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="30" width="150" border="0" frameborder="0" src="../config/areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">¥�̵�ַ��</li>
 <li class="l2"><input type="text" value="<?=$row[xqadd]?>" size="50" class="inp" name="txqadd" /> </li>
 <li class="l1">�ο����ۣ�</li>
 <li class="l2"><input type="text" value="<?=$row[money1]?>" size="10" class="inp" name="tmoney1" /> <span class="fd fd1">Ԫ/ƽ�� (�粻ȷ�������ջ���0)</span></li>
 </ul>
 <ul class="uk1">
 <li class="l1">��ҵ���ͣ�</li>
 <li class="l2">
 <span class="s1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</span>
 <?
 $xs="loupan";
 while1("*","fcw_wylx where xs like '%".$xs."%' and ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <span class="s1"><input name="C1" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[wylx],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name2]?></span>
 <?
 }
 ?>
 </li>
 </ul>
 
 <?
 $xs="xcf¥��xcf";
 if(panduan("*","fcw_wyts where lpwy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1">
 <li class="l1">��ҵ��ɫ��</li>
 <li class="l2">
 <span class="s1"><input name="C21" type="checkbox" onclick="xuan1()" /> ȫѡ</span>
 <?
 while1("*","fcw_wyts where lpwy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <span class="s1"><input name="C11" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[wytsid],"xcf".$row1[id]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name1]?></span>
 <?
 }
 ?>
 </li>
 </ul>
 <? }?>

 <ul class="uk">
 <li class="l1">��¥�绰��</li>
 <li class="l2"><input type="text" value="<?=$row[sltel]?>" class="inp" name="tsltel" /> </li>
 <li class="l1">��ҵ���ʣ�</li>
 <li class="l2">
 <input type="text" value="<?=$row[zygw]?>" class="inp" size="20" name="tzygw" onfocus="inpf(this)" onblur="inpb(this)" />
 �������Ա�ʺţ���û�У�������
 </li>
 <li class="l1">��¥��ַ��</li>
 <li class="l2"><input type="text" value="<?=$row[sladd]?>" size="50" class="inp" name="tsladd" /> </li>
 <li class="l1">¥��״̬��</li>
 <li class="l2">
 <span class="fd fd1">
 <input name="R1" type="radio"<? if(0==$row[lpzt]){?> checked="checked"<? }?> value="0" /> ���� 
 <input name="R1" type="radio"<? if(1==$row[lpzt]){?> checked="checked"<? }?> value="1" /> ���� 
 <input name="R1" type="radio"<? if(2==$row[lpzt]){?> checked="checked"<? }?> value="2" /> ���� 
 </span>
 </li>
 <li class="l1">�ϼ�״̬��</li>
 <li class="l2">
 <span class="fd fd1">
 <input name="R2" type="radio"<? if(0==$row[ifxj]){?> checked="checked"<? }?> value="0" /> ����չʾ 
 <input name="R2" type="radio"<? if(1==$row[ifxj]){?> checked="checked"<? }?> value="1" /> �¼�(ע���¼ܺ�¥�̽�������ʾ����վ��) 
 </span>
 </li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input type="text" value="<?=dateYMD($row[kpsj])?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd')" class="inp" name="tkpsj" /> </li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input type="text" value="<?=$row[rzsj]?>" class="inp" name="trzsj" /> </li>
 <li class="l1">Ԥ�����֤��</li>
 <li class="l2"><input type="text" value="<?=$row[ysxkz]?>" class="inp" name="tysxkz" /> </li>
 <li class="l1">��Ȩ��</li>
 <li class="l2">
 <input type="text" value="<?=$row[cq]?>" size="10" class="inp" name="tcq" id="tcq" /> 
 <span class="fd fd1">��:<a href="javascript:textinto('tcq','70��')">70��</a>��<a href="javascript:textinto('tcq','50��')">50��</a>��<a href="javascript:textinto('tcq','40��')">40��</a></span>
 </li>
 <li class="l1">�����̣�</li>
 <li class="l2"><input type="text" value="<?=$row[kfs]?>" class="inp" name="tkfs" /> </li>
 <li class="l1">�������</li>
 <li class="l2"><input type="text" value="<?=$row[jzlb]?>" class="inp" name="tjzlb" id="tjzlb" /> <span class="fd fd1">�磺<a href="javascript:textinto('tjzlb','��¥���߲�')">��¥���߲�</a>��<a href="javascript:textinto('tjzlb','���ű��������ű���')">���ű��������ű���</a></span></li>
 <li class="l1">ռ�������</li>
 <li class="l2"><input type="text" value="<?=$row[zdmj]?>" class="inp" size="10" name="tzdmj" /> <span class="fd fd1">ƽ��</span></li>
 <li class="l1">���������</li>
 <li class="l2"><input type="text" value="<?=$row[jzmj]?>" class="inp" size="10" name="tjzmj" /> <span class="fd fd1">ƽ��</span></li>
 <li class="l1">�ܻ�����</li>
 <li class="l2"><input type="text" value="<?=$row[zhs]?>" class="inp" size="10" name="tzhs" /></li>
 <li class="l1">�ݻ��ʣ�</li>
 <li class="l2"><input type="text" value="<?=$row[rjl]?>" class="inp" size="10" name="trjl" /></li>
 <li class="l1">�̻��ʣ�</li>
 <li class="l2"><input type="text" value="<?=$row[lhl]?>" class="inp" size="10" name="tlhl" /></li>
 <li class="l1">��ҵ�ѣ�</li>
 <li class="l2"><input type="text" value="<?=$row[wyf]?>" class="inp" size="30" name="twyf" /></li>
 <li class="l1">��ҵ��˾��</li>
 <li class="l2"><input type="text" value="<?=$row[wygs]?>" class="inp" size="30" name="twygs" /></li>
 <li class="l1">��������</li>
 <li class="l2"><input type="text" value="<?=$row[wsfw]?>" class="inp" size="30" name="twsfw" id="twsfw" /> <span class="fd fd1">�磺<a href="javascript:textinto('twsfw','��ҵ���� ��ʱ��ɨ')">��ҵ���� ��ʱ��ɨ</a></span></li>
 <li class="l1">��ڣ�</li>
 <li class="l2"><input type="text" value="<?=$row[xqrk]?>" class="inp" size="30" name="txqrk" /> <span class="fd fd1">�磺5����λ���14��С��</span></li>
 <li class="l1">��λ����</li>
 <li class="l2"><input type="text" value="<?=$row[tcw]?>" class="inp" size="30" name="ttcw" /></li>
 <li class="l1">VR��Ƶ���ӣ�</li>
 <li class="l2"><input type="text" class="inp" name="tvrurl" size="80" value="<?=$row[vrurl]?>" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","loupanlist.php")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>