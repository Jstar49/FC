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
		<div class="article_Card_Bg indiv bodyother box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
			<h1 class="at article_Card_Title" itemprop="name headline">
				<a class="article_Card_blur_cont articletitle fontTheme<?php $this->options->Ttheme()?>" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
			</h1>

			<div class="tips article_Card_Date">
				<span class="article_Card_blur_cont">
					<i class="fa fa-bullseye" style="font-size:16px;"></i>
					<span><time class="font_black" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
				</span>
				<span class="article_Card_blur_cont">
					<i class="fa fa-bookmark" style="font-size:16px;"></i>
					<span class="tags "><?php $this->category(','); ?></span>
				</span>
				
			</div>
			<div class="index_Card_Content font_style article_Card_Cont">
				<span class="font_style article_Card_blur_cont">
					<?php $this->excerpt(300); ?>
				</span>
				
			</div>
			<div class="articletag article_Card_Views">
				<span class="article_Card_blur_cont">
					<i class="fa fa-eye" style="font-size:16px;"></i>
					<span class=""><?php get_post_view($this) ?></span>
				</span>
				
				<span class="article_Card_blur_cont">
					<i class="fa fa-hashtag" style="font-size:16px;"></i>
					<span class="tags "><?php $this->tags(', ', true, 'none'); ?></span>
				</span>
			</div>
		</div>
	<?php endwhile; ?>
	<!-- 主体 -->
	<div class="pageNumber">
		<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
	</div>
	
	<div class="indiv backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>



