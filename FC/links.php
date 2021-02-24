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

	<div class="indiv white postdiv box-shadow">
		<h1 class="at" itemprop="name headline">
			<a class="articletitle white" itemprop="url">友情链接</a>
		</h1>

		<div>
			<?php echo getContentTest($this->content); ?>
		</div>

	</div>

	<!-- 主体 -->

	<!-- 评论区 -->
	<div class="indiv white comsother box-shadow">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv white">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
