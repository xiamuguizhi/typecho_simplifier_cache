<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php if($this->is('index')): ?>
	<link rel="canonical" href="<?php $this->options->siteUrl(); ?>" />
	<?php else: ?>
	<link rel="canonical" href="<?php $this->permalink() ?>" />
	<?php endif; ?>
	<title><?php $this->archiveTitle(array(
				'category'  =>  _t('分类 %s 下的文章'),
				'search'    =>  _t('包含关键字 %s 的文章'),
				'tag'       =>  _t('标签 %s 下的文章'),
				'author'    =>  _t('%s 发布的文章')
			), '', ' - '); ?><?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->options->title(); ?><?php if($this->is('index')): ?> - <?php if ($this->options->summary): ?><?php $this->options->summary(); ?><?php else: ?><?php echo "用爱发电,始于2021"; ?><?php endif; ?><?php endif; ?></title>	
    <link rel="stylesheet" href="<?php $this->options->themeUrl('main.css'); ?>">	
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?90d8b68a65aa5ff48451da2397ca0cc8";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>
	<script data-ad-client="ca-pub-4777131226234293" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>    
	<?php $this->header(); ?>	
 </head>

 <body>

        <div class="inner">
    
<header>
  <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
  <?php $this->options->description() ?>
</header>

<nav>
 <h3>网站分类</h3>
<a href="<?php $this->options->siteUrl(); ?>">首页</a>
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while ($category->next()): ?>
><a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"> <?php $category->name(); ?></a>
<?php endwhile; ?><?php $this->widget('Widget_Contents_Page_List')
                       ->parse('> <a href="{permalink}" >{title}</a>&nbsp;'); ?>
</nav>					   