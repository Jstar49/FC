<?php
/**
 * post.php
 * 
 * 文章页
 * 
 * @author      Jstar
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
// $this->need('includes/header.php');
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<!--页面主要内容-->


<div class="mainContainer bring">
	<!-- header -->
	<?php $this->need('includes/header.php'); ?>
	<!-- header -->

	<!-- 主体 -->

	<div class="indiv white bodyother">
		<h1 class="at" itemprop="name headline">
			<a class="articletitle blue" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		</h1>
		<div class="tips">
			<span>
				<?php _e('时间: '); ?><time class="green" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
			</span>
			<span>
				<?php _e('分类: '); ?><span class="tags"><?php $this->category(','); ?></span>
			</span>
			
		</div>
		<div class="contents">
			<?php $this->content(); ?>
		</div>

		<!-- <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p> -->
		<?php _e('标签: '); ?><span class="tags"><?php $this->tags(', ', true, 'none'); ?></span>
	</div>

	<!-- 主体 -->
	<!-- 评论区 -->
	<div class="indiv blue comsother">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv white">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
