<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--头顶B-->
<div class="bfb topbfbs">
<div class="yjcode">
 <ul class="topu1">
 <li class="l0"><a href="<?=weburl?>mt/">手机版</a><span></span></li>
 <li class="l1">
 您好，欢迎来到<?=webname?>！
 <? while1("*","fcw_ad where adbh='ADI05' order by xh asc");while($row1=mysql_fetch_array($res1)){?>&nbsp;<a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a><? }?>
 </li>
 </ul>
 
 <div class="d1">
  <a href="" class="a1">帮助中心</a>
  
  <div id="notlogin">
  <? if($rowcontrol[regqq]!=1){?>
  <span class="s1"></span>
  <a href="" class="a2">QQ登录</a>
  <? }?>
  <span class="s1"></span>
  <a href="<?=weburl?>reg/" class="a1">登录</a>
  <span class="s1"></span>
  <a href="<?=weburl?>reg/reg.php" class="a1">注册</a>
  </div>
  
  <div id="yeslogin">
  <span class="s1"></span>
  <a href="<?=weburl?>user/un.php" class="a1">退出</a>
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
<!--头顶E-->
