<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
AdminSes_audit();
$admin=$_GET[admin];
$bhid=$_GET[idbh];
$tab=$_GET[tab];
switch($admin){
 case "1":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_area where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_area where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	while0("*","fcw_area where id=".$a[1]);$row=mysql_fetch_array($res);
	deletetable("fcw_area where name1='".$row[name1]."' and name2='".$row[name2]."'");
  }
 }
 break;	
 case "2":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
	if(!is_numeric($nb[$i])){echo "ERR074";exit;}
	deletetable("fcw_ditie where id=".$nb[$i]);
 }
 break;	
 case "3":   //ɾ�����ݳ���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_fwcx where id=".$nb[$i]);
 }
 break;	
 case "4":   //ɾ��д��¥����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_xzllx where id=".$nb[$i]);
 }
 break;	
 case "5":   //ɾ��д��¥����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_xzljb where id=".$nb[$i]);
 }
 break;	
 case "6":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_splx where id=".$nb[$i]);
 }
 break;	
 case "7":   //ɾ�����̼���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_pmlx where id=".$nb[$i]);
 }
 break;	
 case "8":   //ɾ���������ķ���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_helptype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_helptype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_helptype where id=".$a[1]);
  }
 }
 break;	
 case "9":   //ɾ����Ѷ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_newstype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_newstype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_newstype where id=".$a[1]);
  }
 }
 break;	
 case "10":   //ɾ��װ�����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_zxqk where id=".$nb[$i]);
 }
 break;	
 case "11":   //ɾ����ҵ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_wylx  where ifsys=0 and id=".$nb[$i]);
 }
 break;	
 case "12":   //ɾ����ҵ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_peitao where id=".$nb[$i]);
 }
 break;	
 case "13":   //ɾ����ҵ��ɫ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_wyts where id=".$nb[$i]);
 }
 break;	
 case "14":   //�����Ƽ�
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  updatetable($tab,"mytj=1 where bh='".$nb[$i]."'");
 }
 break;	
 case "15":   //ȡ�������Ƽ�
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  updatetable($tab,"mytj=0 where bh='".$nb[$i]."'");
 }
 break;	
 case "16":   //���¼�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "17":   //ɾ����Դ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("id,uid,bh","fcw_fang where bh='".$nb[$i]."'");
  if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_fang where id=".$row1[id]);
  deletetable("fcw_yuyue where fangbh='".$row1[bh]."'");
  deletetable("fcw_tp where bh='".$row1[bh]."'");
  deletetable("fcw_fanggj where fangbh='".$row1[bh]."'");
  delDirAndFile("../upload/".returnuserid($row1[uid])."/f/".$nb[$i]."/");
  }
 }
 break;	
 case "18":   //�����Դ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fang where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fang","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "19":   //���¥��¥�����״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,") && !strstr($adminqx,",0501,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xq where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xq","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "20":   //���¥�̻������״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_huxing where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_huxing","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "21":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_huxing where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
  $tp="upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg";
  delFile("../".$tp);
  delFile("../".returnnotp($tp,"-1"));
  deletetable("fcw_huxing where id=".$row1[id]);
  }
 }
 break;	
 case "22":   //ɾ�����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,") && !strstr($adminqx,",0503,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqphoto where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_xqphoto where id=".$row1[id]);
  delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg");
  delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh]."-1.jpg");
  }
 }
 break;	
 case "23":   //���¥��������״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,") && !strstr($adminqx,",0501,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xqphoto where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xqphoto","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "24":   //���¥�̶�̬���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xqnews where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xqnews","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "25":   //ɾ��¥�̶�̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqnews where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   delDirAndFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh]."/");
   deletetable("fcw_xqnews where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
  }
 }
 break;	
 case "26":   //���¥����Ƶ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xqvideo where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xqvideo","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "27":   //ɾ����Ƶ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqvideo where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1["url"]);
   delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg");
   deletetable("fcw_xqvideo where id=".$row1[id]);
  }
 }
 break;	
 case "28":   //���¥�̿��������״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_kanfang where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_kanfang","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "29":   //ɾ��������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_kanfang where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_kanfang where id=".$row1[id]);
  deletetable("fcw_kanfanguser where kfbh='".$row1[bh]."'");
  $tp=returntp("bh='".$row1[bh]."' and uid='".$row1[uid]."'");
  delFile("../".$tp);
  delFile("../".returnnotp($tp,"-1"));
  deletetable("fcw_tp where bh='".$nb[$i]."' and uid='".$row1[uid]."'");
  }
 }
 break;	
 case "30":   //�������û�֪ͨ״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,uid,zt","fcw_kanfanguser where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_kanfanguser","zt=".$nn." where id=".$row[id]);
  }
 }
 break;	
 case "31":   //ɾ���������û�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_kanfanguser where id=".$nb[$i]);
 }
 break;	
 case "32":   //¥�̵���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,uid,zt","fcw_loupanmsg where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_loupanmsg","zt=".$nn." where id=".$row[id]);
  }
 }
 break;	
 case "33":   //ɾ��¥�̵���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_loupanmsg where id=".$nb[$i]);
 }
 break;	
 case "34":   //ɾ��¥��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,") && !strstr($adminqx,",0503,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,uid","fcw_xq where bh='".$nb[$i]."'");if($row=mysql_fetch_array($res)){
  deleteloupan($row[bh],$row[uid]);
  }
 }
 break;	
 case "35":   //¥��С������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,") && !strstr($adminqx,",0501,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,admin","fcw_xq where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[admin]){$nn=2;}else{$nn=1;}
  updatetable("fcw_xq","admin=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "36":   //��Ѷ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_news where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_news","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37":   //ɾ����Ѷ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_news where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_news where bh='".$row[bh]."'");
  deletetable("fcw_tp where type1='��Ѷ' and bh='".$row[bh]."'");
  }
 }
 break;	
 case "36a":   //�����������״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fckc where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fckc","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37a":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_fckc where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_fckc where bh='".$row[bh]."'");
  }
 }
 break;	
 case "36b":   //Ͷ��������״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_tzlb where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_tzlb","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37b":   //ɾ��Ͷ�����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_tzlb where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_tzlb where bh='".$row[bh]."'");
  }
 }
 break;	
 case "36c":   //����̩�����״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fxtg where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fxtg","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37c":   //ɾ������̩��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_fxtg where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_fxtg where bh='".$row[bh]."'");
  }
 }
 break;	
 case "38":   //ɾ�����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","fcw_ad where bh='".$nb[$i]."' and (type1='ͼƬ' or type1='����')");if($row=mysql_fetch_array($res)){
   delFile("../ad/".$nb[$i].".".$row[jpggif]);
   delFile("../ad/".$nb[$i]."-99.".$row[jpggif]);
  }
  deletetable("fcw_ad where bh='".$nb[$i]."'");
 }
 break;	
 case "39":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
	if(!is_numeric($nb[$i])){echo "ERR074";exit;}
	deletetable("fcw_gongjiao where id=".$nb[$i]);
 }
 break;	
 case "40":   //ɾ����Ա
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while3("id,uid","fcw_user where id=".$nb[$i]);while($row3=mysql_fetch_array($res3)){
  deluid($row3[uid]);
  }
 }
 break;	
 case "41":   //���¥����Ƹ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("id,zt","fcw_loupanjob where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_loupanjob","zt=".$nn." where id=".$row[id]);
  }
 }
 break;
 case "42":   //ɾ��¥����Ƹ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_loupanjob where id=".$nb[$i]);
 }
 break;	
 case "43":   //ɾ������Ա
 if(!strstr($adminqx,",0,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $qx=",0,";
  deletetable("fcw_admin where qx<>'".$qx."' and id=".$nb[$i]);
 }
 break;	
 case "44":   //ɾ����װЧ��ͼ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_phototype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_phototype where type1='".$row[type1]."' and type2='".$row[type2]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_phototype where id=".$a[1]);
  }
 }
 break;	
 case "45":   //ɾ����װЧ��ͼ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","fcw_jia_phototype where id=".$nb[$i]);$row=mysql_fetch_array($res);
  deletetable("fcw_jia_phototype where type1='".$row[type1]."'");
 }
 break;	
 case "46":   //���װ��Ч��ͼ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_jia_photo where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_jia_photo","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "47":   //��Ч��ͼ���¼�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "48":   //ɾ��װ��Ч��ͼ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_jia_photo where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_jia_photo where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
   delDirAndFile("../upload/".returnuserid($row1[uid])."/jia/".$row1[bh]."/");
  }
 }
 break;	
 case "49":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("fcw_help where bh='".$nb[$i]."'");
 }
 break;	
 case "50":   //ɾ��װ��֪ʶ����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_zxtype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_zxtype where type1='".$row[type1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_zxtype where id=".$a[1]);
  }
 }
 break;	
 case "51":   //װ��֪ʶ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_jia_zx where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_jia_zx","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "52":   //ɾ��װ��֪ʶ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_jia_zx where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/jia/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_jia_zx where bh='".$row[bh]."'");
  }
 }
 break;	
 case "53":   //ɾ�����֣�Ҫ�ǵȴ�����״̬��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_tixian where zt<>4 and id=".$nb[$i]);
 }
 break;	
 case "54":   //ɾ��װ���б�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_jia_zb where id=".$nb[$i]);
 }
 break;	
 case "55":   //ɾ���Ҿӽ��Ķ���������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_jctype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_jctype where type1='".$row[type1]."' and type2='".$row[type2]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_jctype where id=".$a[1]);
  }
 }
 break;	
 case "56":   //ɾ���Ҿӽ��Ĵ���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","fcw_jia_jctype where id=".$nb[$i]);$row=mysql_fetch_array($res);
  deletetable("fcw_jia_jctype where type1='".$row[type1]."'");
 }
 break;	
 case "57":   //����Ҿӽ������״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_jia_jc where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_jia_jc","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "58":   //�Ҿӽ������¼�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "59":   //ɾ������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_jia_jc where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_jia_jc where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
   delDirAndFile("../upload/".returnuserid($row1[uid])."/jia/".$row1[bh]."/");
  }
 }
 break;	
 case "60":   //ɾ����������
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_bslx where id=".$nb[$i]);
 }
 break;	
 case "61":   //ɾ����վ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_fz where id=".$nb[$i]);
 }
 break;	
 case "62":   //ɾ����ǩ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_tag where id=".$nb[$i]);
 }
 break;	
 case "63":   //��ǩ���״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,zt","fcw_tag where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_tag","zt=".$nn." where id=".$nb[$i]);
  }
 }
 break;	
 case "64":   //ɾ��¥�����
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_fwlc where id=".$nb[$i]);
 }
 break;	
 case "65":   //ɾ���ؼ۷�Դ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_tejia where id=".$nb[$i]);
 }
 break;	
 case "66":   //�ؼ����״̬
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,zt","fcw_tejia where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_tejia","zt=".$nn." where id=".$nb[$i]);
  }
 }
 break;	
 case "67":   //ɾ��ѧУ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_school where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_school where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_school where id=".$a[1]);
  }
 }
 break;	
 case "68":   //ɾ����Ա�ȼ�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_userdj where id=".$nb[$i]);
 }
 break;	
 case "69":   //ɾ����Դί��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_weituo where id=".$nb[$i]);
 }
 break;	
 case "70":   //ɾ����ԴͼƬ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   while1("*","fcw_tp where id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
   if(!empty($row1[tp])){
   delFile("../".str_replace(".","-1.",$row1[tp]));
   delFile("../".$row1[tp]);
   }
   deletetable("fcw_tp where id=".$nb[$i]);
   }
 }
 break;	
 case "71":   //ɾ�����ڴ���
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("fcw_daikuan where bh='".$nb[$i]."'");
 }
 break;	
 case "72":   //ɾ����ԴԤԼ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("fcw_yuyue where id=".$nb[$i]);
 }
 break;	
 case "73":   //ɾ����Ȧ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("fcw_shangquan where bh='".$nb[$i]."'");
   delDirAndFile("../upload/shangquan/".$nb[$i]."/");
 }
 break;	
 case "74":   //ɾ���ҷ�ί��
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_weituozhao where id=".$nb[$i]);
 }
 break;	
 case "75":   //ɾ���ʽ��¼
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("fcw_moneyrecord where id=".$nb[$i]);
 }
 break;	
 case "76":   //ɾ����¼��־
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_loginlog where id=".$nb[$i]);
 }
 break;	
 case "77":   //ɾ��������ҵ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]����ID $a[1]С��ID
  if(intval($a[0])!=0){  //��ʾɾ������
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_sphy where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_sphy where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //��ʾɾ��С��
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_sphy where id=".$a[1]);
  }
 }
 break;	
 case "78":   //����ѡ�з�Դ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 $sj=date("Y-m-d H:i:s");
 updatetable("fcw_fang","sj='".$sj."' where bh='".$nb[$i]."'");
 }
 break;	
 case "79":   //����ȫ�����۷�Դ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 $sj=date("Y-m-d H:i:s");
 updatetable("fcw_fang","sj='".$sj."' where bh='".$nb[$i]."' and type1='����'");
 }
 break;	
 case "80":   //����ȫ�����ⷿԴ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 $sj=date("Y-m-d H:i:s");
 updatetable("fcw_fang","sj='".$sj."' where bh='".$nb[$i]."' and type1='����'");
 }
 break;	

}
echo "+True";
?>