<?php
function threadedComments($comments, $options) {
    $cby = $comments->authorId == $comments->ownerId ? '<span class="cby">管理</span>' : '';
    $clevel = $comments->levels > 0 ? 'c_c' : 'c_p';
    $author = $comments->url ? '<a href="' . $comments->url . '"'.'" target="_blank"' . ' rel="external">' . $comments->author . '</a>' : $comments->author;
?>
<li id="li-<?php $comments->theId(); ?>" class="<?php echo $clevel;?>">
<div id="<?php $comments->theId(); ?>">
<?php $comments->gravatar($singleCommentOptions->avatarSize, $singleCommentOptions->defaultAvatar);    //头像 只输出 img 没有其它标签 ?>
    <div class="cp">
    <?php $comments->content(); ?>
        <div class="cm"><span class="ca"><?php echo $author ?></span>&nbsp;<?php echo $cby;?>&nbsp;<?php $comments->date(); ?><span class="cr"><?php $comments->reply(); ?></span></div>
    </div>
</div>
<?php if ($comments->children){ ?><div class="children"><?php $comments->threadedComments($options); ?></div><?php } ?>
</li>
<?php } ?>

<div id="comments" class="cf">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
    <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?></h4><br>
    <?php $comments->listComments(); ?><?php $comments->pageNav('&laquo;', '&raquo;'); ?>
<?php endif; ?>
<div id="<?php $this->respondId(); ?>" class="respond">
    <div class="ccr"><?php $comments->cancelReply(); ?></div>
    <h4 class="response">发表新评论</h3>
<form method="post" action="<?php $this->commentUrl() ?>" id="cf" role="form">
<?php if($this->user->hasLogin()): ?>
    <span>已登入<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出 &raquo;</a> | <?php Typecho_Widget::widget('Widget_Security')->to($security); ?><a onclick="if(confirm('确认删除？')==false)return false;location.href='<?php $security->index('/action/contents-post-edit?do=delete&cid='.$this->cid); ?>'">删除文章</a> | <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑文章</a></span>
<?php else: ?>
    <?php if($this->remember('author',true) != "" && $this->remember('mail',true) != "") : ?>
        <span>欢迎【<?php $this->remember('author'); ?>】的归来 | <small style="cursor: pointer;" onclick = "tg_c('ainfo','hinfo');"> 编辑资料</small></span>
        <div id ="ainfo" class="ainfo hinfo">
    <?php else : ?>
        <div class="ainfo">
        <?php endif ; ?>
        <div class="tbox">
        <input type="text" name="author" id="author" class="ci" placeholder="称呼" value="<?php $this->remember('author'); ?>" required>
        <input type="email" name="mail" id="mail" class="ci" placeholder="邮箱" value="<?php $this->remember('mail'); ?>" required>
        <input type="url" name="url" id="url" class="ci" placeholder="http://" value="<?php $this->remember('url'); ?>">
        </div>
        </div>
    <?php endif; ?>
    <div class="tbox"><textarea name="text" id="textarea" class="ci" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="在这里输入你的评论" required ><?php $this->remember('text',false); ?></textarea></div>
    <button type="submit" class="submit" id="submit">提交评论 (Ctrl + Enter)</button>
</form>
</div>
</div>
