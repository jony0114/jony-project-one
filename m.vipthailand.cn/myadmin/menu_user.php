<div class="treebox">
 <div class="ksm">��Ա����</div>
 <ul class="menu">
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==1){?>current <? }?>a1"><em></em>��Ա��Ϣ<i></i></a>
  <ul class="level2" style="display:<? if($leftid==1){?>block;<? }?>">
  <li><a href="userlist.php">���л�Ա</a></li>
  <? for($i=1;$i<=7;$i++){?>
  <li><a href="userlist.php?ut=<?=$i?>"><?=returnuty($i)?></a></li>
  <? }?>
  </ul>
 </li>
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==2){?>current <? }?>a1"><em></em>��Ա�ʽ����<i></i></a>
  <ul class="level2" style="display:<? if($leftid==2){?>block;<? }?>">
  <li><a href="moneylist.php">��ϸ�ʽ��嵥</a></li>
  </ul>
 </li>
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==3){?>current <? }?>a1"><em></em>��Ա����<i></i></a>
  <ul class="level2" style="display:<? if($leftid==3){?>block;<? }?>">
  <li><a href="txlist.php">����������Ϣ</a></li>
  <li><a href="txlist.php?zt=4">��Ҫ���������</a></li>
  </ul>
 </li>
 
 <li class="level1">
  <a href="javascript:void(0);" class="<? if($leftid==4){?>current <? }?>a1"><em></em>����Ա��Ϣ<i></i></a>
  <ul class="level2" style="display:<? if($leftid==4){?>block;<? }?>">
  <li><a href="adminlist.php">����Ա�б�</a></li>
  <li><a href="admin.php">��������Ա</a></li>
  </ul>
 </li>

 </ul>
</div>
<!--LEFT E-->
<? include("left.php");?>
