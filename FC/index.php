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
$this->need('includes/header.php');
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />

<!--页面主要内容-->
<div class="mainContainer">
	<!-- header -->
	
	<!-- header -->

	<!-- 主体 -->
	<?php while($this->next()): ?>
		<div class="indiv bodyother box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
			<h1 class="at" itemprop="name headline">
				<a class="articletitle fontTheme<?php $this->options->Ttheme()?>" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
			</h1>
			<div class="tips">
				<span>
					<i class="fa fa-bullseye" style="font-size:16px;"></i>
					<span><time class="green font_style" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
				</span>
				<span>
					<i class="fa fa-bookmark" style="font-size:16px;"></i>
					<span class="tags font_style"><?php $this->category(','); ?></span>
				</span>
				
			</div>
			<div class="font_style">
				<?php $this->excerpt(300); ?>
			</div>
			<div class="articletag font_style">
				<span>
					<i class="fa fa-eye" style="font-size:16px;"></i>
					<span class="font_style"><?php get_post_view($this) ?></span>
				</span>
				
				<span>
					<i class="fa fa-hashtag" style="font-size:16px;"></i>
					<span class="tags font_style"><?php $this->tags(', ', true, 'none'); ?></span>
				</span>
			</div>
			
		</div>
	<?php endwhile; ?>
	<!-- 主体 -->
	<div class="pageNumber white font_style">
		<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
	</div>
	
	<div class="indiv font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>



