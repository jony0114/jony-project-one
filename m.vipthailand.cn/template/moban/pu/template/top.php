<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<? include("../../../../template/tops.html");?>
<!--ͷ1B-->
<div class="bfb bfbtop1">
<div class="yjcode">

 <div class="top1">
  <div class="logo"><a href="<?=weburl?>"><img border="0" src="<?=weburl?>img/logo.png"  /></a></div>
  <div class="d1"><a href="<?=weburl?>map/index.php?xs=rent" target="_blank">��ͼ�ҷ�</a></div>
  <form name="topf" method="post" onSubmit="return topser()">
  <ul class="u1">
  <li class="l1" onmouseenter="topover()" onmouseleave="topout()">
  <span id="topnwd">����</span><span class="jian"><img src="<?=weburl?>homeimg/jian1.png" /></span>
  <div id="topdiv" style="display:none;">
  <a href="javascript:void(0);" onClick="topaover(5,'rent','_f13v','search','����')">����</a>
  <a href="javascript:void(0);" onClick="topaover(4,'rent','_f12v','search','д��¥')">д��¥</a>
  <a href="javascript:void(0);" onClick="topaover(3,'rent','','search','�ⷿ')">�ⷿ</a>
  <a href="javascript:void(0);" onClick="topaover(1,'loupan','','search','��¥��')">��¥��</a>
  <a href="javascript:void(0);" onClick="topaover(2,'second','','search','���ַ�')">���ַ�</a>
  <a href="javascript:void(0);" onClick="topaover(6,'news','','newslist','��Ѷ')">��Ѷ</a>
  </div>
  </li>
  <li class="l2"><input type="text" name="topsert" /></li>
  <li class="l3"><input type="image" src="<?=weburl?>homeimg/topser.gif" /></li>
  <li class="l4"><a href="<?=weburl?>user/fb.php">��ѷ�����Ϣ</a></li>
  </ul>
  </form>
 </div>
 
</div>
</div>
<!--ͷ1E-->

<!--ͷ2B-->
<div class="bfb bfbtop2">
<div class="yjcode">
 <div class="top2">
  <!--�˵�B-->
  <div class="d2">
   <div class="menu">
   <a href="<?=weburl?>" class="as">��ҳ</a>
   </div>
   <div class="menu">
   <a href="<?=weburl?>rent/search_f13v_j1v.html" class="a1">����ת��</a>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/search_f13v.html" class="a1"><span>��������</span></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/search_f13v.html">���̳���</a>
    <a href="<?=weburl?>second/search_f13v.html">���̳���</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/search_f12v.html" class="a1"><span>д��¥</span></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/search_f12v.html">д��¥����</a>
    <a href="<?=weburl?>second/search_f12v.html">д��¥����</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/search_f14v.html" class="a1"><span>�����ֿ�</span></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/search_f14v.html">��������</a>
    <a href="<?=weburl?>second/search_f14v.html">��������</a>
    <a href="<?=weburl?>rent/search_f25v.html">�ֿ����</a>
    <a href="<?=weburl?>second/search_f25v.html">�ֿ����</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>qiuzu/" class="a1"><span>������</span></a>
    <div class="menulist">
    <a href="<?=weburl?>qiuzu/">������Ϣ</a>
    <a href="<?=weburl?>qiugou/">����Ϣ</a>
    </div>
   </div>
   <div class="menu">
   <a href="<?=weburl?>news/" class="a1">������Ѷ</a>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>loupan/" class="a1"><span>������Ŀ</span></a>
    <div class="menulist">
    <a href="<?=weburl?>loupan/">�·�����</a>
    <a href="<?=weburl?>second/">���ַ�</a>
    <a href="<?=weburl?>rent/">�ⷿ</a>
    <a href="<?=weburl?>jjr/jjrlist.html/">������</a>
    <a href="<?=weburl?>zj/zjlist.html">�н鹫˾</a>
    <? if(1==$rowcontrol[ifjia]){?>
    <a href="<?=weburl?>jc/">��װ��</a>
    <? }?>
    </div>
   </div>

  </div>
  <!--�˵�E-->
 </div>
</div>
</div>
<!--ͷ2E-->