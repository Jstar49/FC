<?php
/**
 * header.php
 * 
 * 一般用作导航栏，也可以不用
 * 
 * @author      熊猫小A
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

?>

<link rel="stylesheet" href="<?php Utils::indexTheme('assets/header.css'); ?>" />
<!-- 
<div class="indiv headother font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
	<ol class="header_list">
		<li><a class="header_pages_title fontTheme<?php $this->options->Ttheme()?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
			<li><a class="header_pages_title fontTheme<?php $this->options->Ttheme()?>" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
		<?php endwhile; ?>
	</ol>
</div>
-->

<div class="index_header">
	<div class="header_nav">
		<div id="toggle">
			<div class="one"></div>
			<div class="two"></div>
			<div class="three"></div>
		</div>
		<div id="header_nav_button" class="header_nav_button" onclick="this">
			Joessem
		</div>
		<ul class="header_nav_bar">
			<li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
			<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
			<?php while($pages->next()): ?>
			<li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
	</div>
</div>