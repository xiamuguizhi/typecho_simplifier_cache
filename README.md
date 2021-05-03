## 前言

这个主题样式就那样，主要是给大家提供一个全站静态化思路！你可以参考这个主题去修改你现在的主题，然后全站自动化生成静态。

ps：我测试了所有主题都可以这样改，`URL什么格式`都可以！！！

![](https://qq.md/data/uploads/20210503/ca7986d5c3134bf9ddf742c4003ab5dc.png)

## 使用

1. 在网站 根目录 新建 文件夹 “cache” 作为缓存文件存放，记得设置`777` 权限

2. `chmod -Rf 777 /usr/themes/simplifier/ `简单暴力，让生成的缓存文件有写入权限

3. 复制`gengxinwenzhang.php` 复制或者移动到`根目录` 这个是手动`更新文章`

![](https://qq.md/data/uploads/20210503/0d0db00ec7889f4c5822a4431b0ddc25.png)


## 说明

预览地址：https://9i3.cn/   目前`15w` 文章都是`缓存文件` 不读取数据库

![](https://qq.md/data/uploads/20210503/a1768c0a2d6bab9f67e231c84df143df.png)

## 文章缓存核心代码


```php
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
$cachetime = 259200; //设置缓存三天，三天后有人访问再次生成最新 三天
 
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
<?php $this->need('comments.php'); //不缓存评论 ?>  
<?php $this->need('footer.php'); ?>
```

## 首页核心代码

```php
<?php

$filename = "index.htm";
 
//定义缓存有效期
$cachetime = 10800;
 
//判断缓存文件是否存在
if(!file_exists($filename) || filemtime($filename)+$cachetime<time())  //filemtime($filename)获取文件修改时间，加上定义的缓存时间小于当前时间
{
     //开启内存缓存
    ob_start();
 
?>
<?php $this->need('index-html.php'); ?>
 
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
<?php else: ?>
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
$cachetime = 86400;
 
//判断缓存文件是否存在
if(!file_exists($filename) || filemtime($filename)+$cachetime<time())  //filemtime($filename)获取文件修改时间，加上定义的缓存时间小于当前时间
{
     //开启内存缓存
    ob_start();
 
?>
<?php $this->need('index-html.php'); ?>
 
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

<?php endif; ?>			
```

## 下载地址

Github:[https://github.com/xiamuguizhi/typecho_simplifier_cache](https://github.com/xiamuguizhi/typecho_simplifier_cache)

本站:https://qq.md/posts/120.html



