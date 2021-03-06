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

<div class="indiv white headother font_style">
	<ol class="header_list">
		<li><a class="header_pages_title" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
			<li><a class="header_pages_title" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
		<?php endwhile; ?>
	</ol>
	
</div>