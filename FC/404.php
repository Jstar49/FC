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
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<!--页面主要内容-->


<div class="mainContainer bring">
	<!-- header -->
	<?php $this->need('includes/header.php'); ?>
	<!-- header -->

	<!-- 主体 -->
	<div class="indiv white bodyother">
		<h1>404 | Not Found</h1>
	</div>

	<div class="indiv white">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
