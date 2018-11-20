 <!--LEFT B-->
 <div class="left">
  <? if(1==$_SESSION[FCWuserID]){?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c1">房源列表</span>
  <ul class="u2">
  <li class="l1"><a href="chushoulist.php" class="acy">我的出售列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="chushoulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="chuzulist.php" class="acy">我的出租列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="chuzulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="qiugoulist.php" class="acy">我的求购列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="qiugoulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="qiuzulist.php" class="acy">我的求租列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="qiuzulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="weituolist.php" class="acy">房源委托</a></li>
  <li class="l1"><a href="yuyuelist.php" class="acy">预约看房管理</a></li>
  </ul>
  <span class="cap c4">资金管理</span>
  <ul class="u2">
  <li class="l1"><a href="paylog.php" class="acy">详细资金记录</a></li>
  <li class="l1"><a href="pay.php" class="acy">我要充值</a></li>
  <li class="l1"><a href="tixian.php" class="acy">我要提现</a></li>
  </ul>
  <span class="cap c5">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="userdj.php" class="acy">会员等级</a></li>
  <li class="l1"><a href="smrz1.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="mobbd.php" class="acy">手机认证</a></li>
  <li class="l1"><a href="emailbd.php" class="acy">邮箱认证</a></li>
  <li class="l1"><a href="inf1.php" class="acy">填写个人资料</a></li>
  <li class="l1"><a href="touxiang.php" class="acy">设置用户头像</a></li>
  </ul>
  
  <? }elseif(2==$_SESSION[FCWuserID]){?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c1">店铺管理</span>
  <ul class="u2">
  <li class="l1"><a href="../jjr/view<?=returnuserid($_SESSION[FCWuser])?>.html" class="acy" target="_blank">我的店铺</a></li>
  </ul>
  <span class="cap c3">内部OA管理</span>
  <ul class="u2">
  <li class="l1"><a href="kehulist.php" class="acy">客户列表</a></li>
  <li class="l1"><a href="kehulx.php" class="acy">新增客户</a></li>
  <li class="l1"><a href="hetonglist.php" class="acy">合同管理</a></li>
  <li class="l1"><a href="hetonglx.php" class="acy">新增合同</a></li>
  </ul>
  <span class="cap c1">房源列表</span>
  <ul class="u2">
  <li class="l1"><a href="chushoulist.php" class="acy">我的出售列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="chushoulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="chuzulist.php" class="acy">我的出租列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="chuzulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="qiugoulist.php" class="acy">我的求购列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="qiugoulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="qiuzulist.php" class="acy">我的求租列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="qiuzulx.php" class="acy">发布</a></li>
  <li class="l1"><a href="weituolist.php" class="acy">房源委托</a></li>
  <li class="l1"><a href="yuyuelist.php" class="acy">预约看房管理</a></li>
  </ul>
  <span class="cap c4">资金管理</span>
  <ul class="u2">
  <li class="l1"><a href="paylog.php" class="acy">详细资金记录</a></li>
  <li class="l1"><a href="pay.php" class="acy">我要充值</a></li>
  <li class="l1"><a href="tixian.php" class="acy">我要提现</a></li>
  </ul>
  <span class="cap c5">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="userdj.php" class="acy">会员等级</a></li>
  <li class="l1"><a href="smrz2.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="mobbd.php" class="acy">手机认证</a></li>
  <li class="l1"><a href="emailbd.php" class="acy">邮箱认证</a></li>
  <li class="l1"><a href="inf2.php" class="acy">填写个人资料</a></li>
  <li class="l1"><a href="touxiang.php" class="acy">设置用户头像</a></li>
  </ul>
  
  <? }elseif(3==$_SESSION[FCWuserID]){?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c5">宝贝管理</span>
  <ul class="u2">
  <li class="l1"><a href="jctypelist.php" class="acy">宝贝分类</a></li>
  <li class="l1"><a href="jclist.php" class="acy">宝贝列表</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="jclx.php" class="acy">新增</a></li>
  </ul>
  <span class="cap c1">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="smrz3.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="inf3.php" class="acy">填写公司资料</a></li>
  </ul>
  
  <? }elseif(4==$_SESSION[FCWuserID]){ //?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c1">店铺管理</span>
  <ul class="u2">
  <li class="l1"><a href="../zj/view<?=returnuserid($_SESSION[FCWuser])?>.html" class="acy" target="_blank">我的店铺</a></li>
  </ul>
  <span class="cap c1">房源列表</span>
  <ul class="u2">
  <li class="l1"><a href="chushoulist.php" class="acy">全部出售列表</a></li>
  <li class="l1"><a href="chuzulist.php" class="acy">全部出租列表</a></li>
  </ul>
  <span class="cap c3">内部OA管理</span>
  <ul class="u2">
  <li class="l1"><a href="kehulist.php" class="acy">客户列表</a></li>
  <li class="l1"><a href="kehulx.php" class="acy">新增客户</a></li>
  <li class="l1"><a href="hetonglist.php" class="acy">合同管理</a></li>
  <li class="l1"><a href="hetonglx.php" class="acy">新增合同</a></li>
  </ul>
  <span class="cap c3">资金管理</span>
  <ul class="u2">
  <li class="l1"><a href="paylog.php" class="acy">详细资金记录</a></li>
  <li class="l1"><a href="pay.php" class="acy">我要充值</a></li>
  <li class="l1"><a href="tixian.php" class="acy">我要提现</a></li>
  </ul>
  <span class="cap c4">成员管理</span>
  <ul class="u2">
  <li class="l1"><a href="userlist.php" class="acy">团队成员</a></li>
  <li class="l1"><a href="user.php" class="acy">添加成员</a></li>
  </ul>
  <span class="cap c5">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="userdj.php" class="acy">会员等级</a></li>
  <li class="l1"><a href="smrz4.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="inf4.php" class="acy">填写中介资料</a></li>
  </ul>
  
  <? }elseif(5==$_SESSION[FCWuserID]){?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c1">楼盘管理</span>
  <ul class="u2">
  <li class="l1"><a href="loupanlist.php" class="acy">楼盘列表</a></li>
  <li class="l1"><a href="loupanlx.php" class="acy">添加新楼盘</a></li>
  </ul>
  <span class="cap c4">资金管理</span>
  <ul class="u2">
  <li class="l1"><a href="paylog.php" class="acy">详细资金记录</a></li>
  <li class="l1"><a href="pay.php" class="acy">我要充值</a></li>
  <li class="l1"><a href="tixian.php" class="acy">我要提现</a></li>
  </ul>
  <span class="cap c5">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="smrz5.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="inf5.php" class="acy">填写公司资料</a></li>
  </ul>
  
  <? }elseif(6==$_SESSION[FCWuserID]){?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c1">店铺管理</span>
  <ul class="u2">
  <li class="l1"><a href="../zx/view<?=returnuserid($_SESSION[FCWuser])?>.html" class="acy" target="_blank">我的店铺</a></li>
  </ul>
  <span class="cap c1">装修效果图管理</span>
  <ul class="u2">
  <li class="l1"><a href="photolist.php" class="acy">效果图列表</a></li>
  </ul>
  <span class="cap c2">成员管理</span>
  <ul class="u2">
  <li class="l1"><a href="userlist6.php" class="acy">团队成员</a></li>
  <li class="l1"><a href="user6.php" class="acy">添加成员</a></li>
  </ul>
  <span class="cap c4">资金管理</span>
  <ul class="u2">
  <li class="l1"><a href="paylog.php" class="acy">详细资金记录</a></li>
  <li class="l1"><a href="pay.php" class="acy">我要充值</a></li>
  <li class="l1"><a href="tixian.php" class="acy">我要提现</a></li>
  </ul>
  <span class="cap c5">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="smrz6.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="inf6.php" class="acy">填写公司资料</a></li>
  </ul>
  
  <? }elseif(7==$_SESSION[FCWuserID]){?>
  <ul class="u1">
  <li class="l1"><a href="./"><?=returnuty($_SESSION[FCWuserID])?></a></li>
  <li class="l2"></li>
  </ul>
  <span class="cap c1">店铺管理</span>
  <ul class="u2">
  <li class="l1"><a href="../designer/view<?=returnuserid($_SESSION[FCWuser])?>.html" class="acy" target="_blank">我的店铺</a></li>
  </ul>
  <span class="cap c1">装修效果图管理</span>
  <ul class="u2">
  <li class="l1"><a href="photolist.php" class="acy">效果图列表</a></li>
  <li class="l1"><a href="photolx.php" class="acy">添加效果图</a></li>
  </ul>
  <span class="cap c4">资金管理</span>
  <ul class="u2">
  <li class="l1"><a href="paylog.php" class="acy">详细资金记录</a></li>
  <li class="l1"><a href="pay.php" class="acy">我要充值</a></li>
  <li class="l1"><a href="tixian.php" class="acy">我要提现</a></li>
  </ul>
  <span class="cap c5">基本设置</span>
  <ul class="u2">
  <li class="l1"><a href="smrz7.php" class="acy">实名认证</a></li>
  <li class="l1"><a href="mobbd.php" class="acy">手机认证</a></li>
  <li class="l1"><a href="emailbd.php" class="acy">邮箱认证</a></li>
  <li class="l1"><a href="inf7.php" class="acy">填写个人资料</a></li>
  <li class="l1"><a href="touxiang.php" class="acy">设置用户头像</a></li>
  </ul>
  
  <? }?>
  
 </div>
 <!--LEFT E-->
 
 <?
 $sj1=date("Y-m-d H:i:s");
 $sj2=dateYMD($sj1);
 $luserid=returnuserid($_SESSION[FCWuser]);
 if(empty($djlock) && ($_SESSION[FCWuserID]==1 || $_SESSION[FCWuserID]==2 || $_SESSION[FCWuserID]==4)){
 if(panduan("*","fcw_user where id=".$luserid." and userdjdq<='".$sj1."'")==1){updatetable("fcw_user","userdj=0 where id=".$luserid);Audit_alert("您的会员已经到期，请先续费！","userdj.php");}
 }
 $userdj=returnuserdj($luserid);
 while1("*","fcw_userdj where id=".$userdj);if($row1=mysql_fetch_array($res1)){
  while2("*","fcw_userdjsx where userid=".$luserid." and sj='".$sj2."' order by sj desc");if(!$row2=mysql_fetch_array($res2)){
  intotable("fcw_userdjsx","userid,sj,sxnum","".$luserid.",'".$sj2."',".$row1[fysx]."");$nid=mysql_insert_id();
  }else{$nid=$row2[id];}
  deletetable("fcw_userdjsx where userid=".$luserid." and id<>".$nid);
 }
 ?>