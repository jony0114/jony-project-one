<?
 //UC��ʼ
 if(1==$rowcontrol[ifuc]){
 $uid = uc_user_register($uid,$pwd,$email); 
 list($uid, $username, $password, $email) = uc_user_login($uid,$pwd);  //��¼
 $id=uc_get_user($uid);
 echo uc_user_synlogin($id[0]);  //ͬ����¼
 }
 //UC����
?>