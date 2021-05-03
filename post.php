<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php

  $pageURL = 'http';
 
  if ($_SERVER["HTTPS"] == "on") 
  {
    $pageURL .= "s";
  }
  $pageURL .= "://";
 

    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

$shouye = $this->options->siteUrl;
$post = str_replace($shouye,"",$pageURL);
$post = str_replace(".html","",$post);	
$post = str_replace("/","",$post);
$cache= "cache/" . $post;
$filename = $cache;
 
//定义缓存有效期
$cachetime = 94608000;
 
//判断缓存文件是否存在
if(!file_exists($filename) || filemtime($filename)+$cachetime<time())  //filemtime($filename)获取文件修改时间，加上定义的缓存时间小于当前时间
{
     //开启内存缓存
    ob_start();
 
?>
<?php $this->need('post-html.php'); ?>
 
<?php
  //从内存缓存中获取页面代码
    $content = ob_get_contents();
    $content .= "\n<!-- 缓存于: " . date( 'Y-m-d H:i:s' ) . " -->";
    //将获取到的内容存放到缓存文件
    file_put_contents($filename,$content);
     
    //清掉内存缓存
    ob_flush();   
 
}
else
{
     include($filename);  //如果存在，调用缓存文件
}
 
?>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>