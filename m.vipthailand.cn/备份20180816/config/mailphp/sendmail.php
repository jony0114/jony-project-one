<?
function yjsendmail($fname,$tmail,$str){
 global $rowcontrol;
 require("../config/mailphp/class.phpmailer.php"); //���ص��ļ�������ڸ��ļ�����Ŀ¼ 
 $mail1=$rowcontrol[mailname]; //�����ʼ�
 $mailsmtp=$rowcontrol[mailsmtp];
 $mailpwd=$rowcontrol[mailpwd];
 $maildk=$rowcontrol[maildk]; //�˿�
 $mail = new PHPMailer(); //�����ʼ�������  
 $mail->IsHTML() ;//
 $address =$mail1;  
 $mail->IsSMTP(); // ʹ��SMTP��ʽ����  
 $mail->Host = $mailsmtp; // ������ҵ�ʾ�����  
 $mail->SMTPAuth = true; // ����SMTP��֤����  
 $mail->Username = $mail1; // �ʾ��û���(����д������email��ַ)  
 $mail->Password = $mailpwd; // �ʾ�����  
 $mail->Port=$maildk;  
 $mail->From = $mail1; //�ʼ�������email��ַ  
 $mail->FromName = $fname;  
 $mail->CharSet = "gb2312";                    	// ָ���ַ���
 $mail->AddAddress($tmail,$tmail);//�ռ��˵�ַ�������滻���κ���Ҫ�����ʼ���email����,��ʽ��AddAddress("�ռ���email","�ռ�������")  
 $mail->Subject = $fname; //�ʼ�����  
 $mail->Body = $str; //�ʼ�����  
 $mail->AltBody = ""; //������Ϣ������ʡ��  
 $mail->Send();
}
?>