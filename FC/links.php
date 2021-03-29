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
$this->need('includes/header.php');
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/links.css'); ?>" />
<!--页面主要内容-->


<div class="mainContainer bring">
	<!-- 主体 -->

	<div class="indiv postdiv box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<h1 class="at" itemprop="name headline">
			<a class="articletitle fontTheme<?php $this->options->Ttheme()?>" itemprop="url">友情链接</a>
		</h1>

		<div class="font_style">
			<?php echo getContentTest($this->content); ?>
		</div>

	</div>

	<!-- 主体 -->

	<!-- 评论区 -->
	<div class="indiv comsother box-shadow font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
