<!--ͷB-->
<div class="bfbtop">
 <div class="d1"><img src="img/logo.png" /></div>
 <div class="d2">
 <? if(strstr($adminqx,",0,") || strstr($adminqx,",0302,")){?><a id="menu1" href="default.php"><img src="img/tm1.png" /><br>ȫ������</a><? }?>
 <? if(strstr($adminqx,",0,") || strstr($adminqx,",0202,")){?><a id="menu3" href="newslist.php"><img src="img/tm3.png" /><br>��Ѷ����</a><? }?>
 <? if(strstr($adminqx,",0,") || strstr($adminqx,",0402,") || strstr($adminqx,",0502,")){?><a id="menu5" href="loupanlist.php"><img src="img/tm5.png" /><br>¥�̹���</a><? }?>
 <? if(strstr($adminqx,",0,") || strstr($adminqx,",0602,")){?><a id="menu6" href="adtypeMT.php"><img src="img/tm6.png" /><br>��滥��</a><? }?>
 </div>
 <div class="d3" onmouseover="topd3over()" onmouseout="topd3out()">
  <ul class="u1">
  <li class="l1"><img src="img/user.png" /></li>
  <li class="l2"><?=$_SESSION[FCWADMINSES]?></li>
  <li class="l3"><img src="img/jian1.png" /></li>
  </ul>
  <div id="tla" style="display:none;">
  <a href="tohtml.php?admin=0&action=gx">������</a>
  <a href="../" target="_blank" class="a1">������ҳ</a>
  <a href="pwd.php" class="a1">�޸�����</a>
  <a href="un.php" class="a1">�˳�</a></div>
 </div>
</div>
<!--ͷE-->
