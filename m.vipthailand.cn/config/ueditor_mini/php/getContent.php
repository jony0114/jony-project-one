<script src="../third-party/jquery.min.js"></script>
<script src="../third-party/mathquill/mathquill.min.js"></script>
<link rel="stylesheet" href="../third-party/mathquill/mathquill.css"/>
<meta http-equiv="Content-Type" content="text/html;charset=gbk"/>
<?php

    //��ȡ����
    error_reporting(E_ERROR|E_WARNING);
    $content =  htmlspecialchars($_POST['myEditor']);

    //�������ݿ������������

    //��ʾ
    echo  "<div class='content'>".htmlspecialchars_decode($content)."</div>";
