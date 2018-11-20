<div class="treebox">
 <div class="ksm">会员管理</div>
 <ul class="menu">
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>会员信息<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="userlist.php">所有会员</a></li>
  <? for($i=1;$i<=7;$i++){?>
  <li><a href="userlist.php?ut=<?=$i?>"><?=returnuty($i)?></a></li>
  <? }?>
  </ul>
 </li>
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==2){?>current <? }?>a1"><em></em>会员资金管理<i></i></a>
  <ul class="level2" style="display:<? if($leftid==2){?>block;<? }?>">
  <li><a href="moneylist.php">详细资金清单</a></li>
  </ul>
 </li>
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==3){?>current <? }?>a1"><em></em>会员提现<i></i></a>
  <ul class="level2" style="display:<? if($leftid==3){?>block;<? }?>">
  <li><a href="txlist.php">所有提现信息</a></li>
  <li><a href="txlist.php?zt=4">需要处理的提现</a></li>
  </ul>
 </li>
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==4){?>current <? }?>a1"><em></em>管理员信息<i></i></a>
  <ul class="level2" style="display:<? if($leftid==4){?>block;<? }?>">
  <li><a href="adminlist.php">管理员列表</a></li>
  <li><a href="admin.php">新增管理员</a></li>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>
