<?
 $getfilter = "'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
 $postfilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
 $cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";

 function stopattack($StrFiltKey, $StrFiltValue, $ArrFiltReq){
  if(is_array($StrFiltValue))$StrFiltValue = implode($StrFiltValue);
  if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue) == 1){   
   echo 'ÄãµÄÐÐÎªÀàËÆÍøÕ¾¹¥»÷£¬ÒÑÊÜµ½·ÀÓùÇ½·ÀÓù£¡´íÎó´úÂë4004£¡';exit;
  }
 }

 foreach($_GET as $key=>$value){stopattack($key,$value,$getfilter);}
?>