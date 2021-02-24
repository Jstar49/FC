<?php
/**
 * FC
 * 
 * 作者：<a href="https://www.joessem.cn">Jstar</a>
 * 
 * @package     FC
 * @author      Jstar
 * @version     1.0
 * @link        https://blog.joessem.cn
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
	<?php while($this->next()): ?>
		<div class="indiv white bodyother box-shadow">
			<h1 class="at" itemprop="name headline">
				<a class="articletitle white" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
			</h1>
			<div class="tips">
				<span>
					<?php _e('时间: '); ?><time class="green" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
				</span>
				<span>
					<?php _e('分类: '); ?><span class="tags"><?php $this->category(','); ?></span>
				</span>
				
			</div>
			<div class="blue-green">
				<?php $this->excerpt(300); ?>
			</div>
			<div class="articletag">
				<?php _e('标签: '); ?><span class="tags"><?php $this->tags(', ', true, 'none'); ?></span>
			</div>
			
		</div>
	<?php endwhile; ?>
	<!-- 主体 -->
	<div class="pageNumber white">
		<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
	</div>
	
	<div class="indiv white">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>



