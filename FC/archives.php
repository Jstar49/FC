<?php
/**
 * <em>Archives</em>
 * 
 * 
 * @package 	custom
 * @author      Jstar
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
// $this->need('includes/header.php');
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/archives.css'); ?>" />
<!--页面主要内容-->


<div class="mainContainer bring">
	<!-- header -->
	<?php $this->need('includes/header.php'); ?>
	<!-- header -->

	<!-- 主体 -->

	<div class="indiv postdiv box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<h1 class="at" itemprop="name headline">
			<a class="articletitle fontTheme<?php $this->options->Ttheme()?>" itemprop="url">归档</a>
		</h1>
		
		<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
		    $year=0; $mon=0; $i=0; $j=0;
		    $output = '<div id="teamnewslist" class="font_style">';
		    while($archives->next()):
		        $year_tmp = date('Y',$archives->created);
		        $mon_tmp = date('m',$archives->created);
		        $y=$year; $m=$mon;
		        // if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
		        if ($year != $year_tmp && $year > 0) $output .= '</ol>';
		        if ($year != $year_tmp) {
		            $year = $year_tmp;
		            $output .= '<h2>'. $year .' 年</h2>'; //输出年份
		        }
		        // if ($mon != $mon_tmp) {
		        //     $mon = $mon_tmp;
		        //     $output .= '<li><span>'. $mon .' 月</span><ul>'; //输出月份
		        // }
		        $output .= '<li><b>'.date('m月d日: ',$archives->created).'</b><a href="'.$archives->permalink .'">'. $archives->title .'</a> <em>('. $archives->commentsNum.')</em></li>'; //输出文章日期和标题
		    endwhile;
		    $output .= '</ol></div>';
		    echo $output;
		?>


	</div>

	<!-- 主体 -->


	<div class="indiv font_style backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>">
		<?php $this->need('includes/footer.php'); ?>
	</div>
</div>
