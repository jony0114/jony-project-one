function callServer(x) {
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������̨��¼���룡");document.f1.t1.focus();return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
$.get("yheckcusk.php",{pwd:document.f1.t1.value},function(result){
 result=trimStr(result);
 if(result=="err1"){alert("������֤��������ʧ��");gourl("default.php");return false;}
 else if(result=="ok"){gxupdate();return false;}
 else{alert("����ʧ�ܣ���ѵ��������ͼ���ۺ���Э���������ʹ������ҷ���(www.yjcode.com)\n"+result);window.location.reload();return false;}
});
return false;
}


function gxupdate() {
 $.get("rjydo.php",{sersj:serversj},function(result){
  if(result=="ok"){location.href="tohtml.php?admin=0&action=gx";return false;}
  else{alert("����ʧ���ˣ���ѵ��������ͼ���ۺ���Э���������ʹ������ҷ���(www.yjcode.com)\n"+response);window.location.reload();return false;}
 });
}

var serversj;
function gxchk() {
 $.get("yjuck.php",{},function(result){
 document.getElementById("gx3").style.display="none";
  if(result=="zx"){document.getElementById("gx2").style.display="";return false;}
  else{document.getElementById("gx1").style.display="";serversj=result;return false;}
 });
}

function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}