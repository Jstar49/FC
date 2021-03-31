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
			<div class="article_Card_Bg_2">
			<h1 class="at" itemprop="name headline">
				<a class="articletitle fontTheme<?php $this->options->Ttheme()?>" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
			</h1>
			<div class="tips">
				<span>
					<i class="fa fa-bullseye" style="font-size:16px;"></i>
					<span><time class="green" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
				</span>
				<span>
					<i class="fa fa-bookmark" style="font-size:16px;"></i>
					<span class="tags "><?php $this->category(','); ?></span>
				</span>
				
			</div>
			<div class="index_Card_Content font_style">
				<?php $this->excerpt(300); ?>
			</div>
			<div class="articletag ">
				<span>
					<i class="fa fa-eye" style="font-size:16px;"></i>
					<span class=""><?php get_post_view($this) ?></span>
				</span>
				
				<span>
					<i class="fa fa-hashtag" style="font-size:16px;"></i>
					<span class="tags "><?php $this->tags(', ', true, 'none'); ?></span>
				</span>
			</div>
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



