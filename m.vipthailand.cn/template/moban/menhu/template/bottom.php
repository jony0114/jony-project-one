<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--B B-->
<div class="bottomy">
 <div class="yjcode">
 <ul class="u1">
 <li class="l1">���ٵ���</li>
 <li class="l2">
 <a href="<?=weburl?>" class="acy"><?=webname?></a><br>
 <a href="<?=weburl?>loupan/" class="acy"><?=webarea?>�·�</a><br>
 <a href="<?=weburl?>second/" class="acy"><?=webarea?>���ַ�</a><br>
 <a href="<?=weburl?>rent/" class="acy"><?=webarea?>�ⷿ</a>
 </li>
 </ul>
 <ul class="u2">
 <li class="l1">��������</li>
 <? 
 while1("*","fcw_helptype where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){
 $aurl="search_j".$row1[id]."v.html";
 if(returncount("fcw_help where ty1id=".$row1[id])==1){
 while3("id,ty1id","fcw_help where ty1id=".$row1[id]." order by sj desc");$row3=mysql_fetch_array($res3);
 $aurl="view".$row3[id].".html";
 }
 ?>
 <li class="l2"><a href="<?=weburl?>help/<?=$aurl?>" class="acy" target="_blank"><?=$row1[name1]?></a></li>
 <? 
 }
 ?>
 </ul>
 <div class="bao"><img src="../homeimg/bao.jpg" width="80" height="81" /></div>
 <ul class="u1">
 <li class="l1">��ҵ����</li>
 <li class="l2">
 <a href="<?=weburl?>reg/reg.php" class="acy">�����û����뷿����</a><br>
 <a href="<?=weburl?>reg/reg.php?u=2" class="acy">��������פ</a><br>
 <a href="<?=weburl?>reg/reg.php?u=4" class="acy">�н��ŵ����</a><br>
 <a href="<?=weburl?>reg/reg.php?u=5" class="acy">¥����פ</a><br>
 </li>
 </ul>
 <ul class="u1 u3">
 <li class="l1">��ɫ����</li>
 <li class="l2">
 <a href="<?=weburl?>user/mianzhuce.php?control=chushou" class="acy">��ѷ������۷�Դ</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=chuzu" class="acy">��ѷ������ⷿԴ</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=qiugou" class="acy">��ѷ�������Ϣ</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=qiuzu" class="acy">��ѷ���������Ϣ</a><br>
 </li>
 </ul>
 <div class="bo">
 <?=$rowcontrol[beian]?> <?=webname?> ��Ȩ���� &copy; 2014-2024 �ͷ����ߣ�<?=webtel?> <br>  
����������վ���������·������ַ������ⷿ�ļ۸����Ϣ�������Ѳο�����ʵ��ϢҪ�Է����ߵ�����Ϊ׼�� 
 <?=$rowcontrol[webtongji]?>
 </div>
 </div>
</div>
<!--B E-->

<? while1("*","fcw_ad where adbh='ADKF' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?>

<!--***********�Ҳม����ʼ*************-->
<? if($rowcontrol[ifqq]=="on"){?>
<div class="rightfd">

 <div class="d1">
  <span class="s1">������ѯ</span>
  <div class="sd1">
  <?
  $qq=preg_split("/,/",$rowcontrol[webqq]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="��վ�ͷ�";}else{$qtit=$qv[1];}
  ?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
  <? }}?>
  <strong class="fontyh">��ѯ����<br><?=webtel?></strong>
  </div>
 </div>

 <div class="d2">
  <span class="s1">ɨһɨ</span>
  <div class="sd1">
  <img src="<?=weburl?>template/getqr.php?u=<?=weburl."m/"?>&size=3" /><br>�ֻ����ʸ����
  </div>
 </div>

 <div class="d3">
  <span class="s1" onClick="gotoTop();return false;">���ض���</span>
 </div>
 
</div>
<? }?>
<!--**********�Ҳม������***************-->
