<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

	<article><!--是文章页面 输出文章标题和内容-->
	<h2><?php $this->title() ?></h2>
	<p><?php if (art_count($this->cid) == "0"): ?>
<h2>非常抱歉，文章内容审核中...</h2><p>为了更加合法合规运营网站，我们正在对全站内容进行审核，之前的内容审核通过后才能访问。</p><p>由于审核工作量巨大，完成审核还需要时间，我们正在想方设法提高审核速度，由此给您带来麻烦，请您谅解。</p><p>如果您从百度访问跳转到这篇博文，说明当前访问的内容还在审核列表中，如果您急需访问，麻烦您将对应的网址反馈给我们，我们会优先审核。</p><h2>反馈方式：</h2><p>发邮件至 typechozz@qq.com<br>或者在 <a href="https://9i3.cn/page/messages.html">https://9i3.cn/page/messages.html</a> 中提交 本文URL</p><p><img src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-2fa930c8-feec-4942-ac88-ba3781377bb0/d474b6e9-58b7-49b4-9e71-e57493974aa1.jpg" alt="请输入图片描述" title="请输入图片描述"></p>                					

<?php else: ?>
<?php
  $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
  $replacement = '<img loading="lazy" src="$1" alt="'.$this->title.'" title="'.$this->title.'">';
  $content = preg_replace($pattern, $replacement, $this->content);
  echo $content;
?>
</code></pre></p> 
<?php endif; ?>

	</article>
