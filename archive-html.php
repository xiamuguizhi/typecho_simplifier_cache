<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

        <h4><?php $this->archiveTitle(array(
            'category'  =>  _t('%s：'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?><?php if ($this->is('category')): ?><?php echo $this->getDescription(); ?><?php endif; ?></h4>

<section>		
<?php if ($this->have()): ?>
<?php while($this->next()): ?>     

<?php $this->date( ); ?> <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a></br>


<?php endwhile; ?>
 <?php else: ?>
            
                <p>什么也没有发现诶</p>
				<img src="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-2fa930c8-feec-4942-ac88-ba3781377bb0/0665488b-661c-4630-8b36-66c353041ef8.gif">
           
        <?php endif; ?>
	 </section>	
 <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

	<?php $this->need('footer.php'); ?>
