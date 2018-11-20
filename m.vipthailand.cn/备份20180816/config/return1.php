<?php
/*
2014年起，友价团队全部源码不再做加密处理，全部开源，方便用户二次开发。
同时我们仅对正规渠道购买的用户提供技术支持。
另：如果源码购买后有转卖行为，我们即删除你的认证帐号，同时也不再提供任何支持。
www.yj99.cn
友价源码
*/

function sqlzhuru($content) {
        $pattern = "/(select[\s])|(union[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
        if (is_array($content)) {
            foreach ($content as $key=>$value) {
				if(get_magic_quotes_gpc()){$content[$key] = trim($value);}else{$content[$key] = addslashes(trim($value));}
                if(preg_match($pattern,$content[$key])) {
                    $content[$key] = '';
                }
            }
        } else {
			if(get_magic_quotes_gpc()){$content=trim($content);}else{$content=addslashes(trim($content));}
            if(preg_match($pattern,$content)) {
                $content = '';
            }
        }
        $content=str_replace("<?","&lt;?",$content);
        $content=str_replace("?>","?&gt;",$content);
        return $content;
    }

function sqlzhuru1($content){
        return sqlzhuru($content);
}

function returnhz($t){
$a=preg_split("/\./",$t);
return $a[count($a)-1];
}

function returndeldian($x){
$a=str_replace(".","",sqlzhuru($x));
$b=str_replace("/","",$a);
return $b;
}

function returnnotp($t,$a=""){
 $tpv=preg_split("/\./",$t);
 return $tpv[0].$a.".".$tpv[1];
}

function returntppd($tp1,$tp2){
if(is_file($tp1)){return $tp1;}else{return $tp2;}
}

function returnjgdw($m,$d,$t="面议"){
 if(empty($m)){return $t;}else{return $m.$d;}
}

function returnqiu($m1,$m2,$d,$t="面议"){
   if($m1==0 && $m2!=0){$m="不超".$m2.$d;}
   elseif($m1!=0 && $m2!=0){$m=$m1."-".$m2.$d;}
   elseif($m1!=0 && $m2==0){$m=$m1.$d."左右";}
   else{$m=$t;}
   return $m;
}

function returnzdv($v){
 if(0==$v || empty($v)){return "";}else{return $v;}
}

/*核心搜索区函数B*/
function rentser($x,$xv,$y,$yv='',$nq="search",$z='',$zv=''){
if(empty($nq)){$nq="search";}
$nstr=$_GET[str];
if(!check_in("_".$x.$xv."v",$nstr)){
if(check_in("_".$x,$nstr)){
 $a=preg_split("/_".$x."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$x.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$x.$xv."v".$d[1];
}else{
 $nstr=$nstr."_".$x.$xv."v";
}
}
if($y!=""){
if(!check_in("_".$y.$yv."v",$nstr)){
if(check_in("_".$y,$nstr)){
 $a=preg_split("/_".$y."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$y.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$y.$yv."v".$d[1];
}else{
 $nstr=$nstr."_".$y.$yv."v";
}
}
}
if($z!=""){
if(!check_in("_".$z.$zv."v",$nstr)){
if(check_in("_".$z,$nstr)){
 $a=preg_split("/_".$z."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$z.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$z.$zv."v".$d[1];
}else{
 $nstr=$nstr."_".$z.$zv."v";
}
}
}
if($xv==""){$nstr=str_replace("_".$x."v","",$nstr);}
if($yv==""){$nstr=str_replace("_".$y."v","",$nstr);}
if($zv==""){$nstr=str_replace("_".$z."v","",$nstr);}
global $rowcontrol;
$jg=($nq.$nstr);
if($rowcontrol[sermode]==2){$jg=urlencode($jg);}
return $jg.".html";
}
/*核心搜索区函数E*/

function returnsx($x){
 $nstr=$_GET[str];
 if(check_in("_".$x,$nstr)){
 $re1=preg_split("/_".$x."/",$nstr);
 $re3=preg_split("/_/",$re1[1]);
 $re2=preg_split("/v/",$re3[0]); 
 $ssr="";
 for($ri=0;$ri<count($re2);$ri++){$ssr=$ssr.$re2[$ri];if($ri<(count($re2)-2)){$ssr=$ssr."v";}}
 if($ssr==""){$nr=-1;}else{$nr=$ssr;}
 return $nr;
 }else{
 return -1;
 }
}

function check_in($arr, $text){
if(empty($arr)){return 0;}
$keys = explode(',',$arr);
$result = 0;
if($keys){
 foreach($keys as $key){
 if(strstr($text,$key)!=''){$result = 1;break;}
 }
}
return $result;
}

function DateDiff($date1, $date2, $unit = "") {
switch ($unit) {
   case 's':
$dividend = 1;
break;
   case 'i':
$dividend = 60;
break;
   case 'h':
$dividend = 3600;
break;
   case 'd':
$dividend = 86400;
break;
   case 'm':
$dividend = 2628000;
break;
   case 'y':
$dividend = 31536000;
break;
   default:
$dividend = 86400;
}
$time1 = strtotime($date1);
$time2 = strtotime($date2);
if ($time1 && $time2) return (float)($time1 - $time2) / $dividend;
return false;
}

function dateYMD($m){
$a=preg_split("/\s/",$m);return $a[0];
}

function dateYMDN($m){
$a=preg_split("/\s/",$m);
$b=str_replace("-","",$a[0]);
$b=str_replace("/","",$b);
return $b;
}

function dateYMDHM($m){
$a=preg_split("/:/",$m);return $a[0].":".$a[1];
}

function randsj($x){
$a=preg_split("/-/",$x);return $a[0]."-".rnd_num(12)."-".rnd_num(28)." ".rnd_num(12).":".rnd_num(59).":".rnd_num(59);
}

function rnd_num($num){
$seedarray =microtime();$seedstr =preg_split("/\s/",$seedarray,5);$seed =$seedstr[0]*10000;srand($seed);return rand(1,$num);
}

function js_unescape($str){
$ret = '';$len = strlen($str);for($i=0;$i<$len;$i++){if ($str[$i] == '%' && $str[$i+1] == 'u'){$val = hexdec(substr($str, $i+2, 4));if ($val < 0x7f) $ret .= chr($val);else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));$i += 5;}else if ($str[$i] == '%'){$ret .= urldecode(substr($str, $i, 3));$i += 2;}else $ret .= $str[$i];}return iconv('utf-8', 'gb2312', $ret);}

function returnuty($rid){
 if($rid==1){return "个人用户";}
 elseif($rid==2){return "经纪人";}
 elseif($rid==3){return "建材公司";}
 elseif($rid==4){return "中介公司";}
 elseif($rid==5){return "房开公司";}
 elseif($rid==6){return "装修公司";}
 elseif($rid==7){return "设计师";}
}

function returnztv($zv,$zvsm=""){
 if(0==$zv){$ztv="<span class='blue'>已通过审核</span>";}
 elseif(1==$zv){$ztv="<span class='feng'>正在审核</span>";}
 elseif(2==$zv){$ztv="<span class='red'>审核不通过,".$zvsm."</span>";}
 return $ztv;
}
function getDir($dir){$dirArray[]=NULL;if (false != ($handle = opendir ( $dir ))) {$i=0;while ( false !== ($file = readdir ( $handle )) ) {if ($file != "." && $file != ".."&&!strpos($file,".")) {$dirArray[$i]=$file;$i++;}}closedir ( $handle );}return $dirArray;}
function getSubDirs($dir){$subdirs = array();if(!$dh = opendir($dir))return $subdirs;$i = 0;while ($f = readdir($dh)){if($f =='.' || $f =='..')continue;$path = $f;	$subdirs[$i] = $path;$i++;}return $subdirs;}

function returntitdian($t,$l){$len=strlen($t);if($len>$l){return strgb2312($t,0,$l-3)."...";}else{return $t;}}function returntitcss($t,$b,$c,$n=0){$tit=$t;if($n!=0){if(1==$b){$tit=strgb2312($tit,0,$n-3);}else{$tit=strgb2312($tit,0,$n);}}if(1==$b){$tit="<strong>".$tit."</strong>";}if(!empty($c)){$tit="<font color='".$c."'>".$tit."</font>";}return $tit;}function strgb2312($str, $start, $len) {$tmpstr = "";$strlen = $start + $len;for($i = 0; $i < $strlen; $i++) {if(ord(substr($str, $i, 1)) > 0xa0) {$tmpstr .= substr($str, $i, 2);$i++;} else$tmpstr .= substr($str, $i, 1);}return $tmpstr;}function read_file_content($FileName) {$fp=fopen($FileName,"r"); $data=""; while(!feof($fp)) {$data.=fread($fp,4096); } fclose($fp); return $data; } 
function inp_tp_upload($ni,$mcnur,$mcname,$gs=""){$i=$ni; if(check_in(";",$_FILES["inp$i"]["tmp_name"])){exit;}if(!empty($_FILES["inp$i"]["tmp_name"])){$filetype = strtolower($_FILES["inp$i"]['type']); $tp = array("image/gif","image/pjpeg","image/jpeg","image/jpg","image/x-png","image/png","application/x-shockwave-flash","application/octet-stream"); if(!in_array($_FILES["inp$i"]["type"],$tp)){ echo "<script>alert('格式不对');history.go(-1);</script>";exit;}$gs=strtolower($gs);if($filetype == 'image/jpeg'){$type = '.jpg';}if ($filetype == 'image/jpg') {$type = '.jpg';}if ($filetype == 'image/pjpeg') { 
$type = '.jpg';}if($filetype == 'image/gif'){$type = '.gif';}if($filetype == 'image/x-png' || $filetype=="image/png"){$type = '.png';}if($filetype == 'application/x-shockwave-flash'){$type = '.swf';}if($filetype == 'application/octet-stream'){ 
$type = '.flv';}$tna=$_FILES["inp$i"]["name"]; if($gs==""){$gsv=$type;}else{$gsv=".".$gs;}move_uploaded_file($_FILES["inp$i"]['tmp_name'], $mcnur.$mcname.$gsv);
 $lastB=$mcname.$gsv;}else{$lastB="";}return $lastB;}function htmlget($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, CHR);
curl_setopt($ch, CURLOPT_HEADER,0);
$output = curl_exec($ch);
curl_close($ch);
return $output;
}
function systs($a,$b){if($_GET[t]=="suc"){echo "<div class=\"systs\">".$a."[<a href=\"".$b."\">知道了</a>]</div>";}}function MakePass($length){ 
$possible = "0123456789";$str = ""; 
while(strlen($str) < $length) 
{ 
$str .= substr($possible, (rand() % strlen($possible)), 1); 
} 
return($str); 
} 
function safeEncoding($string){global $rowcontrol;if(empty($rowcontrol[sermode])){return base_decode(($string));}else{return $string;}}
function base_encode($str){$src  = array("/","+","=");$dist = array("|a","|b","|c");$old  = base64_encode($str);$new  = str_replace($src,$dist,$old);return $new;}
function base_decode($str){$src = array("|a","|b","|c");$dist  = array("/","+","=");$old  = str_replace($src,$dist,$str);$new = base64_decode($old);return $new;}
function returnsearch($x){
 global $rowcontrol;
 if(empty($rowcontrol[sermode])){$kv=base_encode($x);}
 elseif($rowcontrol[sermode]==2){$kv=urlencode($x);}
 else{$kv=$x;} 
 return $kv;
}

function returnuserqx($uqx,$nqx){
if(!strstr($uqx,$nqx)){
 global $rowcontrol;
 $str="<div class='qxerr'><strong>尊敬的用户,您的帐号未开通该项功能，请通过以下方式联系开通：</strong><br><br>";
 $str=$str."在线客服：<br>";
 $qq=preg_split("/,/",$rowcontrol[webqq]);
 for($qqi=0;$qqi<count($qq);$qqi++){
 $qv=preg_split("/\*/",$qq[$qqi]);
 if($qv[0]!=""){
  if($qv[1]==""){$qtit="网站客服";}else{$qtit=$qv[1];}
  $str=$str."<a href=\"http://wpa.qq.com/msgrd?v=1&uin=".$qv[0]."&site=".weburl."&menu=yes\" target=\"_blank\">".$qtit." QQ:".$qv[0]."</a><br>";
  }
 }
 $str=$str."<br>平台热线：<br><strong>".webtel."</strong></div>"; 
 echo $str;exit;
}
}

function returnvideo($w,$h,$u,$t,$lj){
 if($t=="flv"){
 $str="
 <script type=\"text/javascript\">var swf_width=".$w.";var swf_height=".$h.";var texts='';var files='".$u."';
  document.write('<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\"   codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"'+ swf_width +'\" height=\"'+ swf_height +'\">');
  document.write('<param name=\"movie\" value=\"".$lj."config/flv.swf\"><param name=\"quality\" value=\"high\">');
  document.write('<param name=\"menu\" value=\"false\"><param name=\"allowFullScreen\" value=\"true\" />');
  document.write('<param name=\"FlashVars\" value=\"vcastr_file='+files+'&IsAutoPlay=1\">');
  document.write('<embed src=\"".$lj."config/flv.swf\" allowFullScreen=\"true\" FlashVars=\"vcastr_file='+files+'&vcastr_title='+texts+'\" menu=\"false\" quality=\"high\" width=\"'+ swf_width +'\" height=\"'+ swf_height +'\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />'); 
  document.write('</object>');
  </script>
 ";
 }elseif($t=="swf"){
 $str="<embed type=\"application/x-shockwave-flash\" class=\"edui-faked-video\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" src=\"".$u."\" width=\"".$w."\" height=\"".$h."\" style=\"float: none\" wmode=\"transparent\" play=\"true\" loop=\"false\" menu=\"false\" allowscriptaccess=\"never\" allowfullscreen=\"true\"/>";
 }
 return $str;
}

function returnfvideo($u,$w,$h){
 if(strstr($u,"qq.com")!=""){ //腾讯视频
 $a=preg_split("/vid=/",$u);
 return "<div id=\"mod_player_skin\"></div><script language=\"javascript\" src=\"http://qzs.qq.com/tencentvideo_v1/js/tvp/tvp.player.js\" charset=\"utf-8\"></script><script language=\"javascript\">var video = new tvp.VideoInfo();video.setVid(\"".$a[1]."\");var player = new tvp.Player(".$w.", ".$h.");player.setCurVideo(video);player.addParam(\"autoplay\",\"1\");player.addParam(\"wmode\",\"transparent\");player.write(\"mod_player_skin\");</script>";
 }elseif(strstr($u,"youku.com")!=""){ //优酷视频
 $a=preg_split("/id_/",$u);
 $b=preg_split("/\./",$a[1]);
 return "<iframe height=".$h." width=".$w." src=\"http://player.youku.com/embed/".$b[0]."\" frameborder=0 allowfullscreen></iframe>";
 }
}

function returnadminqx(){
$qx=array("0101,房源编辑|0102,房源查看|0103,房源删除",
		  "0201,资讯编辑|0202,资讯查看|0203,资讯删除",
		  "0301,全局编辑|0302,全局查看|0303,全局删除",
		  "0401,楼盘编辑|0402,楼盘查看|0403,楼盘删除",
		  "0501,小区编辑|0502,小区查看|0503,小区删除",
		  "0601,广告编辑|0602,广告查看|0603,广告删除",
		  "0701,会员编辑|0702,会员查看|0703,会员删除",
		  "0801,家装编辑|0802,家装查看|0803,家装删除"
		  );	
return $qx;
}

function returnfxjd($x){
 if(99==$x){return "<span class='feng'>新录入的客户</span>";}
 elseif(0==$x){return "<span class='red'>前期电话沟通</span>";}
 elseif(1==$x){return "<span class='green'>已看房，持续跟进中</span>";}
 elseif(2==$x){return "<span class='blue'>已签合同，成单</span>";}
 elseif(3==$x){return "<span class='hui'>客户放弃购买</span>";}
}

function returntxzt($x,$y){
 if(1==$x){return "<span class='blue'>提现成功</span>";}
 elseif(2==$x){return "<span class='hui'>用户已经撤销提现</span>";}
 elseif(3==$x){return "<span class='red'>提现失败,".$y."</span>";}
 elseif(4==$x){return "<span class='green'>等待受理</span>";}
}

function returnonecon($x){
 if(1==$x){return "公司简介";}
 elseif(2==$x){return "发展历程";}
 elseif(3==$x){return "公司愿景";}
 elseif(4==$x){return "品牌发展";}
 elseif(5==$x){return "联系我们";}
 elseif(6==$x){return "购房流程";}
 elseif(7==$x){return "购房阶段";}
 elseif(8==$x){return "持有阶段";}
 elseif(9==$x){return "出售阶段";}
 elseif(10==$x){return "底部版权";}
}

function returnczfs($x){
 if(1==$x){return "整租";}
 elseif(2==$x){return "合租";}
}

function returntagv($x){
 if(1==$x){return "资讯标签";}
}

function returnlc($x,$y){
 if(0==$x || 0==$y){return "-";}
 elseif($x<($y/3)){return "低层";}
 elseif($x>=($y/3) && $x<=($y/3*2)){return "中层";}
 elseif($x>($y/3*2)){return "高层";}
}

function returntjbtn($a,$b=""){$bk="";if($b!=""){$bk="<input type=\"button\" class=\"btn2 tjinput\" value=\"返回\" />";}return "<input type=\"submit\" class=\"btn1 tjinput\" value=\"".$a."\" />".$bk;}
?>