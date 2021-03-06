<?php
/**
 * archive.php
 * 
 * 搜索、分类、标签页
 * 
 * @author      Jstar
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
?>

<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<!--页面主要内容-->

<div class="mainContainer bring">
	<!-- header -->
	<?php $this->need('includes/header.php'); ?>

	
		<h1 class="at white" itemprop="name headline">
			<?php $this->archiveTitle(array(
	            'category'  =>  _t('分类 %s 下的文章'),
	            'search'    =>  _t('包含关键字 %s 的文章'),
	            'tag'       =>  _t('标签 %s 下的文章'),
	            'author'    =>  _t('%s 发布的文章')
	        ), '', ''); ?>
		</h1>

		<?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
    		<div class="indiv white bodyother">
    			<h1 class="at" itemprop="name headline">
					<a class="articletitle white" itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
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
						<span class="view-times font_style"><?php get_post_view($this) ?></span>
					</span>
					
					<span>
						<i class="fa fa-hashtag" style="font-size:16px;"></i>
						<span class="tags"><?php $this->tags(', ', true, 'none'); ?></span>
					</span>
				</div>
			</div>

		<?php endwhile; ?>
		<div class="pageNumber blue">
			<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
		</div>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
	

	<div class="indiv white font_style">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
