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
$this->need('includes/header.php');
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<!--页面主要内容-->


<div class="mainContainer bring">

	<!-- 主体 -->

	<div class="indiv postdiv box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
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
		<div class="contents">
			<?php echo getContentTest($this->content); ?>
		</div>

		<div class="contents_tail_info">
			<?php $this->options->contents_tail_info()?>
			<p>本文采用 <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">BY-NC-SA</a> 协议进行授权，在不违法此协议的前提下，您可以自由转载或改动。</p>
			<p>本文链接：<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></p>
			
		</div>

		<div class="articletag font_style">
			<span>
				<i class="fa fa-eye" style="font-size:16px;"></i>
				<span class="view-times font_style"><?php get_post_view($this) ?>  </span>
			</span>
			
			<span>
				<i class="fa fa-hashtag" style="font-size:16px;"></i>
				<span class="tags"><?php $this->tags(', ', true, 'none'); ?></span>
			</span>
		</div>
	</div>

	<!-- 主体 -->
	<!-- 评论区 -->
	<div class="indiv comsother font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('comments.php'); ?>
	</div>

	<div class="indiv font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
