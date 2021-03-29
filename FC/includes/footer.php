<?php
/**
 * footer.php
 * 
 * 输出 <footer> 标签，并关闭 <body>、<html> 标签
 * 
 * @author      熊猫小A
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/footer.css'); ?>" />

<div class="foot">
	<?php $this->options->footerEcho();?>
	Power By Typecho | Theme <a href="https://github.com/Jstar49/FC" target="_blank">FC</a> by <a href="https://github.com/Jstar49" target="_blank">Jstar</a>
</div>
<footer>
<script src="<?php Utils::indexTheme('assets/main.js'); ?>"></script>
<?php $this->footer(); ?>
</footer>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
		$('figure').viewer({
			navbar: false,
			button: true,
			toolbar: false,
			title: false
		});
		$('p').viewer({
			navbar: false,
			button: true,
			toolbar: false,
			title: false
		});
	});
	var open = false;
    $('#toggle').click(function (){
                // 按钮状态
        // $(this).css("background-color", open ? '#fff' : '#222');  // logo周边颜色
        var navBar = $('.header_nav_bar');
                // 设置header的高度，将导航列表显示出来
        var height = navBar.offset().top + navBar.height();
        console.log(height);
        $('.index_header').animate({
            height: open ? 50 : height
        });
                // 修改开关状态
        open = !open;
    });

    $("#toggle").click(function() {
      $(this).toggleClass("on");
      // $("#menu").slideToggle();
    });
</script>