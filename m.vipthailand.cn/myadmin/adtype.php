<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$mb=$rowcontrol[nowmb];
if(empty($mb)){$mb="default";}
require("../template/moban/".$mb."/fcwmanage/adtype.php");
?>
