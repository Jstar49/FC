<?php
/**
 * <em>Links</em>
 * 
 * 
 * @package 	custom
 * @author      Jstar
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
// $this->need('includes/header.php');
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/links.css'); ?>" />
<!--页面主要内容-->


<div class="mainContainer bring">
	<!-- header -->
	<?php $this->need('includes/header.php'); ?>
	<!-- header -->

	<!-- 主体 -->

	<div class="indiv blue bodyother">
		<h1 class="at" itemprop="name headline">
			<a class="articletitle blue" itemprop="url">友情链接</a>
		</h1>

		<div>
			<?php $this->content(); ?>
		</div>

	</div>

	<!-- 主体 -->

	<!-- 评论区 -->
	<div class="indiv blue comsother">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv blue">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
