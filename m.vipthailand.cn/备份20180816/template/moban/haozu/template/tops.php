<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<div class="bfb topbfbs">
<div class="yjcode">
 <ul class="topu1">
 <li class="l1">
 您好，欢迎来到<?=webname?>！
 <? while1("*","fcw_ad where adbh='ADI05' order by xh asc");while($row1=mysql_fetch_array($res1)){?>&nbsp;<a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a><? }?>
 </li>
 <li class="l2">
 <span id="notlogin">
  <a href="<?=weburl?>reg/" class="a1">登录</a> | <a href="<?=weburl?>reg/reg.php" class="a1">免费注册</a>
  <? if($rowcontrol[regqq]!=1){?> | <a href="<?=weburl?>config/qq/oauth/index.php">QQ登录</a><? }?>
 </span>
 <span id="yeslogin" style="display:none;">
  <span class="feng" id="yesuid"></span>&nbsp;<a href="<?=weburl?>user/" class="green" id="tuzx">进入会员中心</a> | <a href="<?=weburl?>user/un.php" class="green">退出</a>
 </span>
 </li>
 </ul>
 <span id="webhttp" style="display:none"><?=weburl?></span>
</div>
</div>
<script language="javascript">
userCheckses();
</script>