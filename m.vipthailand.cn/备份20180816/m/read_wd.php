<?
set_time_limit(0);
header("Content-Type:text/html;charset=GB2312");
include("../config/conn.php");
include("../config/function.php");
$page=intval($_GET[p]);
pagef(" where zt=0 and type1id=58",3,"fcw_news","order by lastsj desc");while($row=mysql_fetch_array($res)){
echo " <div class='d3'>Q£º".$row[tit]."</div><div class='d4'><strong>A£º</strong>".strip_tags($row[txt])."</div>";
}
?>
