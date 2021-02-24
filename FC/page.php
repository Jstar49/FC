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
				<?php _e('时间: '); ?><time class="green" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
			</span>
			
		</div>
		<div>
			<?php $this->content(); ?>
		</div>
	</div>

	<!-- 主体 -->

	<div class="indiv white comsother">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv white ">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
