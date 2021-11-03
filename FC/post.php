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
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/post.css'); ?>" />
<script type="text/javascript" src="<?php Utils::indexTheme('js/post.js'); ?>"></script>
<!--页面主要内容-->

<div class="mainContainer bring">

	<!-- 主体 -->

	<div class="postdiv box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
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
		<!-- <div><?php getCatalog(); ?></div> -->
		<!-- 正文 -->
		<div class="contents">
			<?php echo getContentTest($this->content); ?>
		</div>
		<!-- 文章尾部-->
		<div class="contents_tail_info">
			<?php $this->options->contents_tail_info()?>
			<p>本文采用 <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">BY-NC-SA</a> 协议进行授权，在不违法此协议的前提下，您可以自由转载或改动。</p>
			<p>本文链接：<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></p>
			
		</div>
		<!-- tag信息 -->
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
	
	<!-- 页面尾部 -->
	<div class="indiv font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('includes/footer.php'); ?>
	</div>
	<!-- 文章页的右下角元素 -->
	<div class="post-right-bottom-box">
		<div class="post_Catalog_div_box">
			<div class="card is-collapsed">
				<div class="card_expander">
					<div class="post_Catalog_div"><?php getCatalog(); ?></div>
				</div>
			</div>
		</div>

		<!-- 按钮列表 -->
		<ul class="post_right_bottom_ul">
			<li>
				<a onClick="post_Memu_Show();" class="sidenav-trigger btn-floating blue lighten-2" data-target="category" >
					<i class="fa fa-bars" aria-hidden="true"></i>
				</a>
			</li>
			<li>
				<a class="btn-floating blue lighten-1" href="javascript: scrollTo(0, 0);">
					<i class="fa fa-arrow-up" aria-hidden="true"></i>
				</a>
			</li>
		</ul>
	</div>
</div>
