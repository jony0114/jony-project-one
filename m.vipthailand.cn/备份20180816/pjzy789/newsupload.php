<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
AdminSes_audit();
if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "��Ȩ��";exit;}
$bh=$_GET[bh];
while1("bh,sj","fcw_news where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){exit;}
$tplj1="upload/news/".dateYMDN($row1[sj])."/".$bh."/";

 if($_GET[action]=="update"){  //�ϴ�
 $sj=date("Y-m-d H:i:s");
 $nbh=time();
 $wjv=$tplj1.$nbh.".jpg";
 intotable("fcw_clear","bh,tp,type1,sj","'".$bh."','".$wjv."','".$_GET[ty]."','".$sj."'");$clearid=mysql_insert_id();
 uploadtpnodata(1,$tplj1,$nbh.".jpg","allpic",400,400,200,200,0,0,"no");
 php_toheader("newsupload.php?bh=".$bh."&tpbh=".$nbh."&clearid=".$clearid);
 
 }elseif($_GET[action]=="del"){ //ɾ��
  if(panduan("bh","fcw_news where bh='".$bh."'")==1){
  delFile("../".$tplj1.$_GET[tpbh].".jpg");
  delFile("../".$tplj1.$_GET[tpbh]."-1.jpg");
  if($_GET[clearid]!=""){deletetable("fcw_clear where id=".$_GET[clearid]);}
  if($_GET[tpid]!=""){deletetable("fcw_tp where id=".$_GET[tpid]);}
  php_toheader("newsupload.php?bh=".$bh);
  }
 }

$dis1="none";
$dis3="none";
$tpx="-1";
if($_GET[tpbh]!=""){
 $dis1="none";$dis3="";$tpv="../".$tplj1.$_GET[tpbh].$tpx.".jpg";$tpvb="../".$tplj1.$_GET[tpbh].".jpg";

}elseif($_GET[tpbh]==""){$dis1="";$dis3="none";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="">
<meta name="description" content="">
<title>ͼƬ�ϴ�</title>
<style type="text/css">
body{margin:0;font-size:12px;color:#333;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.main{float:left;width:74px;height:91px;}
#upload .inptp{position: relative;overflow: hidden;display:inline-block;*display:inline;padding:39px 0 0 0;height:52px;text-align:center;cursor:pointer;width:74px;float:left;}
#upload .inptp input{position: absolute;border:solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float:left;width:101px;height:91px;margin:-39px 0 0 -96px;}
#delbtn{float:left;background-color:#404141;width:74px;height:16px;text-align:center;padding:4px 0 0 0;filter:alpha(opacity=70);-moz-opacity:0.7;-khtml-opacity: 0.7;
opacity: 0.7;position:absolute;margin:71px 0 0 0;}
#delbtn img{cursor:pointer;}
</style>
<script language="javascript">
function filecha(){
document.getElementById("upload").style.display="none";
document.getElementById("uping").style.display="";
tpf.submit();
}
function tover(){
<? if($_GET[tpbh]!=""){?>document.getElementById("delbtn").style.display="";<? }?>
}
function tout(){
document.getElementById("delbtn").style.display="none";
}
function del(){
document.getElementById("tph").style.display="none";
document.getElementById("uping").style.display="";
location.href="newsupload.php?tpbh=<?=$_GET[tpbh]?>&action=del&bh=<?=$bh?>&tpid=<?=$_GET[tpid]?>&clearid=<?=$_GET[clearid]?>&ty=<?=urlencode($_GET[ty])?>";	
}
</script>
</head>
<body>
<div class="main">
<!--ɾ����ť-->
<div id="delbtn" style="display:none;">
<img src="img/delbtn.png" onclick="del()" width="11" height="11" />
</div>
<!--ɾ����ť-->

<!--�ȴ��ϴ���ʼ-->
<form method="post" name="tpf" enctype="multipart/form-data" action="newsupload.php?tpbh=<?=$_GET[tpbh]?>&action=update&bh=<?=$bh?>&ty=<?=urlencode($_GET[ty])?>">
<div id="upload" style="display:<?=$dis1?>;">
 <span class="inptp"><span>Ч��ͼ�ϴ�</span>
 <input type="file" onchange="filecha()" name="inp1" id="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"></span>
</div>
<input type="hidden" value="upload" name="jvs" />
</form>
<!--�ȴ��ϴ�����-->

<!--�����ϴ�-->
<div id="uping" style="display:none;">
<img src="img/grey.gif" width="74" height="91" />
</div>
<!--�����ϴ�-->

<!--��ͼ-->
<div id="tph" style="display:<?=$dis3?>;">
<a href="<?=$tpvb?>" target="_blank"><img border="0" src="<?=$tpv?>?rid=<?=rnd_num(100)?>" id="tpimg" width="74" height="91" /></a>
</div>
<!--��ͼ-->

</div>
</body>
</html>