
function fxtgonc(x){
 for(i=1;i<=3;i++){
 document.getElementById("fxtgcap"+i).className="";
 document.getElementById("fxtgn"+i).style.display="none";
 }
 document.getElementById("fxtgcap"+x).className="a1";
 document.getElementById("fxtgn"+x).style.display="";
}

function lptxtonc(x){
 for(i=1;i<=2;i++){
 document.getElementById("lptxt"+i).style.display="none";
 document.getElementById("lptxtcap"+i).className="d1";
 }
 document.getElementById("lptxt"+x).style.display="";
 document.getElementById("lptxtcap"+x).className="d1 d11";
}