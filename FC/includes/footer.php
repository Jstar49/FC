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
