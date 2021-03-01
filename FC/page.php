<?php
/**
 * page.php
 * 
 * 独立页
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

	<div class="indiv white postdiv box-shadow">
		<h1 class="at" itemprop="name headline">
			<a class="articletitle white" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		</h1>
		<div class="tips">
			<span>
				<i class="fa fa-bullseye" style="font-size:16px;"></i>
				<span><time class="green font_style" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
			</span>
			
		</div>
		<div class="font_style">
			<?php $this->content(); ?>
		</div>
	</div>

	<!-- 主体 -->

	<div class="indiv white comsother font_style">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv white font_style">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
