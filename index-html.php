<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- simplifier 首页 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4777131226234293"
     data-ad-slot="6434384900"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<section>
 <h3>最新文章</h3>
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=60')->parse('{year}/{month}/{day} <a href="{permalink}">{title}</a><br>'); ?><!--输出1w篇文章/后输出发布时间;标题文章链接-->
</section>		

              <section>
                <div><h3>友情链接</h3><span class="tips">想出现在友链中？请联系我们</span></div>
				<ul>
               <li><a href="https://zezeshe.com/" target="_blank" title="泽泽社长">泽泽社长</a></li>
               <li><a href="https://xiamuyourenzhang.cn/" target="_blank" title="夏目贵志">夏目贵志</a></li>
				<li><a href="https://www.bgu.cc/" target="_blank" title="手机布谷网" >手机布谷网</a></li>
				<li><a href="http://www.seo520.com/" target="_blank" title="手机布谷网" >千狐B2B网址导航网</a></li>
				<li><a href="https://52ql.cn" target="_blank" title="云仙小站" >云仙小站</a></li>				
               <li><a href="https://www.ihewro.com/" target="_blank" rel="nofollow" title="友人C">友人C</a></li>
               <li><a href="https://ae.js.cn/" target="_blank" rel="nofollow" title="JOE">JOE</a></li>			   
				</ul>
           </section>	
	<section>			
<h3>版权声明</h3>
本站资源来自互联网收集,仅供用于学习和交流,请遵循相关法律法规,本站一切资源不代表本站立场,如有侵权、后门、不妥请联系本站删除<br>			
	</section>		
<?php $this->need('footer.php'); ?>
