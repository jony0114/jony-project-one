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
  <div class="d1"><a href="<?=weburl?>map/index.php?xs=loupan">��ͼ�ҷ�</a></div>
  <form name="topf" method="post" onSubmit="return topser()">
  <ul class="u1">
  <li class="l1" onmouseenter="topover()" onmouseleave="topout()">
  <span id="topnwd">�·�</span><span class="jian"><img src="<?=weburl?>homeimg/jian1.png" /></span>
  <div id="topdiv" style="display:none;">
  <a href="javascript:void(0);" onClick="topaover(1,'loupan','','search','��¥��')">��¥��</a>
  <a href="javascript:void(0);" onClick="topaover(2,'second','','search','���ַ�')">���ַ�</a>
  <a href="javascript:void(0);" onClick="topaover(3,'rent','','search','�ⷿ')">�ⷿ</a>
  <a href="javascript:void(0);" onClick="topaover(4,'second','_f12v','search','д��¥')">д��¥</a>
  <a href="javascript:void(0);" onClick="topaover(5,'second','_f13v','search','����')">����</a>
  <a href="javascript:void(0);" onClick="topaover(6,'news','','newslist','��Ѷ')">��Ѷ</a>
  </div>
  </li>
  <li class="l2"><input type="text" name="topsert" /></li>
  <li class="l3"><input type="image" src="<?=weburl?>homeimg/ser.gif" /></li>
  <li class="l4"><a href="<?=weburl?>user/fb.php"><img border=0 src="<?=weburl?>homeimg/fb.gif" /></a></li>
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
  <!--����B-->
  <div class="d1" onmouseover="leftmenuover()" onmouseout="leftmenuout()">
   <span class="scap"></span>
   <div id="xlmenu" style="display:none;">
   
     <div class="xl xl1">
      <span class="xlcap">����</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <span class="sa"><a href="<?=weburl?>loupan/search_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a></span>
      <? }?>
      </div>
     </div>
   
     <div class="xl xl2">
      <span class="xlcap">�۸�</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <? 
      $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
      if(0==$i){$str=$a[0]."����";$m1=0;$m2=$a[0];}
      elseif(count($a)==$i){$str=$a[count($a)-1]."����";$m1=$a[count($a)-1];$m2=999999;}
      else{$str=$a[$j-1]."-".$a[$j];$m1=$a[$j-1];$m2=$a[$j];}
      ?>
      <span class="sa1"><a href="<?=weburl?>loupan/search_b<?=$m1?>v_c<?=$m2?>v.html" class="acy"><?=$str?></a></span>
      <? $i++;}?>
      </div>
     </div>
   
     <div class="xl xl3">
      <span class="xlcap">���</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <?
      $xsv=",loupan,";
      while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' and xs like '%".$xsv."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
      ?>
      <span class="sa"><a href="<?=weburl?>loupan/search_f<?=$row1[id]?>v.html" class="acy"><?=$row1[name2]?></a></span>
      <? }?>
      </div>
     </div>
   
     <div class="xl xl4">
      <span class="xlcap">��ɫ</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <? $i=1;$ts="xcf¥��";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <span class="sa"><a href="<?=weburl?>loupan/search_t<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a></span>
      <? }?>
      </div>
     </div>
     
   </div>
  </div>
  <!--����E-->
  <!--�˵�B-->
  <div class="d2">
   <div class="menu">
   <a href="<?=weburl?>" class="a1">��ҳ</a>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>loupan/" class="a1"><span>�·�</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>lphuxing/huxinglist.html">�����ҷ�</a>
    <a href="<?=weburl?>lpjg/">�۸�����</a>
    <a href="<?=weburl?>lpnews/newslist.html">¥���Ż�</a>
    <a href="<?=weburl?>lpphoto/photolist.html">ͼ��¥��</a>
    <a href="<?=weburl?>lpvideo/videolist.html">������Ƶ</a>
    <a href="<?=weburl?>lpjob/joblist.html">¥����Ƹ</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>second/" class="a1"><span>���ַ�</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>second/">��Ҫ��</a>
    <a href="<?=weburl?>qiugou/">����Ϣ</a>
    <a href="<?=weburl?>xq/">С���ҷ�</a>
    <a href="<?=weburl?>jjr/jjrlist.html">�Ҿ�����</a>
    <a href="<?=weburl?>zj/zjlist.html">�н鹫˾</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/" class="a1"><span>���ⷿ</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/">��Ҫ�ⷿ</a>
    <a href="<?=weburl?>qiuzu/">������Ϣ</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>second/search_f13v.html" class="a1"><span>����</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>second/search_f13v.html">���̳���</a>
    <a href="<?=weburl?>rent/search_f13v.html">���̳���</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>second/search_f12v.html" class="a1"><span>д��¥</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>second/search_f12v.html">д��¥����</a>
    <a href="<?=weburl?>rent/search_f12v.html">д��¥����</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>news/" class="a1"><span>��Ѷ</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <? while1("*","fcw_newstype where admin=1 order by xh asc limit 7");while($row1=mysql_fetch_array($res1)){?>
    <a href="<?=weburl?>news/newslist_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
    <? }?>
    </div>
   </div>
   <? if(1==$rowcontrol[ifjia]){?>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>jc/" class="a1"><span>��װ��</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>zx/xzxlist.html">ѧװ��</a>
    <a href="<?=weburl?>zx/">װ�޹�˾</a>
    <a href="<?=weburl?>designer/caselist.html">������</a>
    <a href="<?=weburl?>zx/zbview.html">���б�</a>
    <a href="<?=weburl?>designer/">���ʦ</a>
    <a href="<?=weburl?>jc/">ѡ����</a>
    </div>
   </div>
   <? }?>

   <div class="menu">
    <a href="<?=weburl?>mt/" class="a1">�ֻ��ҷ�</a>
   </div>

  </div>
  <!--�˵�E-->
 </div>
</div>
</div>
<!--ͷ2E-->