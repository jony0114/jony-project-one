<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
  <ul class="topu1">
  <li class="l1">
  <span class="s1">���ã���ӭ����<?=webname?>����<a href="<?=weburl?>">�ص���ҳ</a>��</span>
  </li>
  <li class="l2">
  <span id="notlogin">
   <? if($rowcontrol[regqq]!=1){?><span class="s2"><a href="<?=weburl?>config/qq/oauth/index.php"><img border="0" src="<?=weburl?>img/qq_login.png" /></a></span><? }?>
   <span class="s1">
    <a href="<?=weburl?>reg/" class="a1">��¼</a> | 
    <a href="<?=weburl?>reg/reg.php" class="a1">���ע��</a>
   </span>
  </span>
  <span id="yeslogin" style="display:none;">
  <span class="feng" id="yesuid"></span>&nbsp;<a href="<?=weburl?>user/" class="green" id="tuzx">�����Ա����</a> | <a href="<?=weburl?>user/un.php" class="green">�˳�</a> 
  </span>
  </li>
  </ul>
  <span id="webhttp" style="display:none"><?=weburl?></span>
 <script language="javascript">
 userCheckses();
 </script>