<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<? include("../../../../template/tops.html");?>

<!--������ʼ-->
<div class="topbfb">
 <div class="yjcode">
  
  <h1 class="logo"><a href="<?=weburl?>"><img src="<?=weburl?>img/logo.png" border=0 /></a></h1>
 
  <div class="tsearch">
  <form name="topf1" method="post" action="<?=weburl?>search/index.php?admin=20">
  <ul class="u1">
  <li class="l1">
  <input type="text" name="t1" data-tip="������С������" placeholder="������С������" id="tsearcht1" autocomplete="off" disableautocomplete>
  <div id="tsearchHtml" style="display:none;"></div>
  </li>
  <li class="l2"><input type="submit" class="fontyh" value="��ʼ�ҷ�" /></li>
  <li class="l3"><a href="<?=weburl?>map/index.php?xs=xq" target="_blank">��ͼ�ҷ�</a></li>
  </ul>
  </form>
  </div>
  
  <ul class="webmenu">
  <li class="l2"><a href="<?=weburl?>" class="a1">��ҳ</a></li>
  
  <li class="lxx"></li>
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
  
  <li class="lxx"></li>
  <li class="l3"><a href="<?=weburl?>lptuan/tuanlist.html" class="red a1">����<span class="s1"><img border="0" src="<?=weburl?>img/icon7.gif" /></span></a></li>
  
  <li class="lxx"></li>
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
  
  <li class="lxx"></li>
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
  <li class="lxx"></li>
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

  <li class="lxx"></li>
  <li class="l2"><a href="<?=weburl?>news/" class="a1">��Ѷ</a></li>
   
  </ul>
 
 </div>
</div>
<script language="javascript">
 function tsearchCHA(){
  t1v=document.topf1.t1.value;
  document.getElementById("tsearchHtml").innerHTML="";
  document.getElementById("tsearchHtml").style.display="none";
  if(t1v!=""){
     $.post("<?=weburl?>homeimg/txqsearch.php",{keyv:t1v},function(result){
      $("#tsearchHtml").html(result);
	  if(result!=""){
	  document.getElementById("tsearchHtml").style.display="";
	  }
     });
  }
 }
 $('#tsearcht1').bind('input propertychange', function() {
  tsearchCHA();
 });
 </script>
<!--��������-->