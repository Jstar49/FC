<link rel="stylesheet" href="<?php Utils::indexTheme('assets/comments.css'); ?>" />

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    }
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>

<!-- 自定义评论列表部分  -->
<div class="comlist" id="<?php $comments->theId(); ?>">
    <?php $comments->gravatar('40', ''); ?>
    <span class="authorurl">
    	<?php $comments->author(); ?>
    </span>
    <div class="comcontent">
    <?php $comments->content(); ?>
    </div>
    <span class="timeandreply">
    	<span class="comtimes"><?php $comments->date('Y-m-d H:i'); ?></span>
    	<span class="comment-reply"><?php $comments->reply(); ?></span>
    </span>
</div>
<!-- 子评论 -->

<?php if ($comments->children) { ?>
	<div class="comreply">
      <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>

<?php } ?>
<?php $this->comments()->to($comments); ?>
<?php if ($this->allow('comment')) : ?>
   <!-- 评论表单form放的地方-->
   <div id="<?php $this->respondId(); ?>">
      
     <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
              <?php if($this->user->hasLogin()): ?>
              <p><?php _e('登录身份: '); ?><a class="idenfy" href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a class="idenout" href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
              <?php else: ?>
            	<div class="username">
            		<div id="usernameleft" for="author" class="required"><?php _e('称呼'); ?></div>
                	<div id="usernameright"><input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required /></div>
            	</div>
              <div class="usermail">
              	<div id="usermailleft" for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('邮箱'); ?></div>
                	<div id="usermailright"><input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> /></div>
              </div>
              <div class="urlinput">
                  <div id="urlleft" for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></div>
                  <div id="urlright"><input type="url" name="url" id="url" class="text" placeholder="<?php _e('(非必填)http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> /></div>
              </div>
              <?php endif; ?>
              <p>
                  <!-- <label for="textarea" class="required"><?php _e('内容'); ?></label> -->
                  <textarea class="textinput" rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
              </p>
              <p>
                  <button class="submitcom" type="submit" class="submit"><?php _e('提交评论'); ?></button>
                  <span class="cancelre"> <!-- 取消回复 -->
			        <?php $comments->cancelReply(); ?>
			      </span>
              </p>
          </form>
      </div>
  <?php else : ?>
    <h3><?php _e('评论已关闭'); ?></h3>
  <?php endif; ?>

<!-- 回复列表 -->

  <?php if ($comments->have()) : ?>
        <!-- 评论头部提示信息 -->
        <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h4>
        <!-- 评论的内容 -->
        <?php $comments->listComments(); ?>
        <!-- 评论page -->
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

  <?php endif; ?>