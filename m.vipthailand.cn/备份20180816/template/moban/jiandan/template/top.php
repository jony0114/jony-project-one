<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<? include("../../../../template/tops.html");?>

<!--������ʼ-->
<div class="topbfb">
 <div class="yjcode">
 
 <div class="logo"><? include("../../../../template/fzqh.php");?></div>
 <div class="mtmap">
 <a href="<?=weburl?>mt/" class="a1" target="_blank">�ֻ��ҷ�</a>
 <a href="<?=weburl?>map/index.php?xs=loupan" target="_blank" class="a2">��ͼ�ҷ�</a>
 </div>

 
 <div class="menu">
  <ul class="u1">
  <li class="l2"><a href="<?=weburl?>" class="a1">��ҳ</a></li>
  
  <li class="l3" onmouseover="smenuover(2)" onmouseout="smenuout(2)">
   <a href="<?=weburl?>loupan/" class="a1">��¥��</a>
   <div class="smenu" id="smenu2" style="display:none;">
   <a href="<?=weburl?>lphuxing/huxinglist.html" class="a2">�����ҷ�</a>
   <a href="<?=weburl?>lpjg/" class="a2">�۸�����</a>
   <a href="<?=weburl?>lpnews/newslist.html" class="a2">¥���Ż�</a>
   <a href="<?=weburl?>lpphoto/photolist.html" class="a2">ͼ��¥��</a>
   <a href="<?=weburl?>lpvideo/videolist.html" class="a2">������Ƶ</a>
   <a href="<?=weburl?>lpjob/joblist.html" class="a2">¥����Ƹ</a>
   </div>
  </li>
  
  <li class="l3"><a href="<?=weburl?>lptuan/tuanlist.html" class="red a1">����<span class="s1"><img border="0" src="<?=weburl?>img/icon7.gif" /></span></a></li>
  
  <li class="l3" onmouseover="smenuover(1)" onmouseout="smenuout(1)">
   <a href="<?=weburl?>second/" class="a1">���ַ�</a>
   <div class="smenu" id="smenu1" style="display:none;">
   <a href="<?=weburl?>second/" class="a2">��Դ�б�</a>
   <a href="<?=weburl?>xq/" class="a2">С���ҷ�</a>
   <a href="<?=weburl?>jjr/jjrlist.html" class="a2">�Ҿ�����</a>
   <a href="<?=weburl?>zj/zjlist.html" class="a2">�н鹫˾</a>
   <a href="<?=weburl?>qiugou/" class="a2">����Ϣ</a>
   </div>
  </li>
  
  <li class="l2" onmouseover="smenuover(3)" onmouseout="smenuout(3)">
   <a href="<?=weburl?>rent/" class="a1">�ⷿ</a>
   <div class="smenu" id="smenu3" style="display:none;">
   <a href="<?=weburl?>rent/" class="a2">��Դ�б�</a>
   <a href="<?=weburl?>xq/" class="a2">С���ҷ�</a>
   <a href="<?=weburl?>jjr/jjrlist.html" class="a2">�Ҿ�����</a>
   <a href="<?=weburl?>zj/zjlist.html" class="a2">�н鹫˾</a>
   <a href="<?=weburl?>qiuzu/" class="a2">������Ϣ</a>
   </div>
  </li>

  <? if(1==$rowcontrol[ifjia]){?>
  <li class="l3" onmouseover="smenuover(4)" onmouseout="smenuout(4)">
  <a href="<?=weburl?>jc/" class="a1">��װ��</a>
   <div class="smenu" id="smenu4" style="display:none;">
   <a href="<?=weburl?>zx/xzxlist.html" class="a2">ѧװ��</a>
   <a href="<?=weburl?>zx/" class="a2">װ�޹�˾</a>
   <a href="<?=weburl?>designer/caselist.html" class="a2">������</a>
   <a href="<?=weburl?>zx/zbview.html" class="a2">���б�</a>
   <a href="<?=weburl?>designer/" class="a2">���ʦ</a>
   <a href="<?=weburl?>jc/" class="a2">ѡ����</a>
   </div>
  </li>
  <? }?>

  <li class="l4"><a href="<?=weburl?>map/index.php?xs=loupan" class="a1">��ͼ�ҷ�</a></li>

  <li class="l2"><a href="<?=weburl?>news/" class="a1">��Ѷ</a></li>
  
  <li class="l3" onmouseover="smenuover(5)" onmouseout="smenuout(5)">
   <a href="<?=weburl?>tool/dkjsq/" class="a1">��������</a>
   <div class="smenu" id="smenu5" style="display:none;">
   <a href="<?=weburl?>dai/" class="a2">���ڴ���</a>
   <a href="<?=weburl?>tool/dkjsq/" class="a2">���������</a>
   <a href="<?=weburl?>tool/dkjsq/index.php?t=gjj" class="a2">���������</a>
   <a href="<?=weburl?>tool/tqhdjsq/" class="a2">��ǰ����</a>
   <a href="<?=weburl?>tool/gfnlpg/" class="a2">��������</a>
   </div>
  </li>
  
  </ul>
  
 </div>
 
 </div>
</div>
<!--��������-->