<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--ͷ��B-->
<div class="bfb topbfbs">
<div class="yjcode">
 <ul class="topu1">
 <li class="l0"><a href="<?=weburl?>mt/">�ֻ���</a><span></span></li>
 <li class="l1">
 ���ã���ӭ����<?=webname?>��
 <? while1("*","fcw_ad where adbh='ADI05' order by xh asc");while($row1=mysql_fetch_array($res1)){?>&nbsp;<a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a><? }?>
 </li>
 </ul>
 
 <div class="d1">
  <a href="" class="a1">��������</a>
  
  <div id="notlogin">
  <? if($rowcontrol[regqq]!=1){?>
  <span class="s1"></span>
  <a href="" class="a2">QQ��¼</a>
  <? }?>
  <span class="s1"></span>
  <a href="<?=weburl?>reg/" class="a1">��¼</a>
  <span class="s1"></span>
  <a href="<?=weburl?>reg/reg.php" class="a1">ע��</a>
  </div>
  
  <div id="yeslogin">
  <span class="s1"></span>
  <a href="<?=weburl?>user/un.php" class="a1">�˳�</a>
  <span class="s1"></span>
  <a id="yesuid" href="<?=weburl?>user/" class="a1 feng"></a>
  </div>
  
 </div>
 
 <span id="webhttp" style="display:none"><?=weburl?></span>
</div>
</div>
<script language="javascript">
userCheckses();
</script>
<!--ͷ��E-->
