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
		var test1;
		var style;
		var div_Size;

		// var bg_url = "https://cdn.jsdelivr.net/gh/mybules/cdn@1.6.0/mybules/2020-8-15-1/monv.jpg";
		
		<?php if ($this->options->index_card_background){ ?>
			var bg_urls_source_chars = "<?php $this->options->index_card_background()?>";
			var bg_urls_arrays = bg_urls_source_chars.split(',');
			// console.log(bg_urls_arrays);
			test1 = document.querySelectorAll(".article_Card_Bg");
			test1_article_Card_Title = document.querySelectorAll(".article_Card_Title");
			test1_article_Card_Date = document.querySelectorAll(".article_Card_Date");
			test1_article_Card_Cont = document.querySelectorAll(".article_Card_Cont");
			test1_article_Card_Views = document.querySelectorAll(".article_Card_Views");
			div_Size = document.querySelectorAll(".article_Card_blur_cont");
			for (var i = 0; i < test1.length; i++) {
				bg_url = bg_urls_arrays[Math.floor(Math.random()*bg_urls_arrays.length)];
				style = document.createElement('style');
				style.innerText = ".article_Card_Bg"+ i +"{\
								background-image: url("+bg_url+");\
								background-size: 100%;\
								position: relative;\
								background-position: center;\
								transition: 1.5s;\
								}\
								div.article_Card_Bg:hover{\
								background-size:120%;\
								}\
								.article_Card_Title"+ i +"{} \
								.article_Card_Title"+i+"::before { \
								content: '';\
								position: absolute;\
								width: "+(div_Size[i*6+0].offsetWidth+5)+"px;\
								height: "+(div_Size[i*6+0].offsetHeight+5)+"px;\
								left: 20px;\
								background-image: url("+bg_url+");\
    							filter: blur(9px);\
								}\
								.article_Card_Date"+ i +"{} \
								.article_Card_Date"+i+"::before { \
								content: '';\
								position: absolute;\
								width: "+(div_Size[i*6+1].offsetWidth+div_Size[i*6+2].offsetWidth+5)+"px;\
								height: "+(div_Size[i*6+1].offsetHeight+5)+"px;\
								left: 20px;\
								background-image: url("+bg_url+");\
    							filter: blur(9px);\
								}\
								.article_Card_Cont"+ i +"{} \
								.article_Card_Cont"+i+"::before { \
								content: '';\
								position: absolute;\
								width: "+(div_Size[i*6+3].offsetWidth+5)+"px;\
								height: "+(div_Size[i*6+3].offsetHeight+5)+"px;\
								left: 20px;\
								\
								background-image: url("+bg_url+");\
    							filter: blur(9px);\
								}\
								.article_Card_Views"+ i +"{} \
								.article_Card_Views"+i+"::before { \
								content: '';\
								position: absolute;\
								width: "+(div_Size[i*6+4].offsetWidth+div_Size[i*6+5].offsetWidth+5)+"px;\
								height: "+(div_Size[i*6+4].offsetHeight+5)+"px;\
								left: 20px;\
								\
								background-image: url("+bg_url+");\
    							filter: blur(9px);\
								}";
				document.body.appendChild(style);
				test1[i].setAttribute("class","article_Card_Bg"+i+" article_Card_Bg indiv bodyother box-shadow backTheme<?php $this->options->Ttheme()?> fontTheme<?php $this->options->Ttheme()?>");
				test1_article_Card_Title[i].setAttribute("class","article_Card_Title"+i);
				test1_article_Card_Date[i].setAttribute("class","article_Card_Date"+i);
				test1_article_Card_Cont[i].setAttribute("class","article_Card_Cont"+i);
				test1_article_Card_Views[i].setAttribute("class","article_Card_Views"+i);
			}
			/*
			document.body.appendChild(style);
			// 文章卡片标题背景模糊
			test1 = document.querySelectorAll(".article_Card_Title");
			div_Size = document.querySelectorAll(".article_Card_blur_cont");
			// console.log(div_Size[0].offsetWidth);
			for (var i = 0; i < test1.length; i++) {
				style = document.createElement('style');
				style.innerText = ".article_Card_Title"+ i +"{} \
									.article_Card_Title"+i+"::before { \
									content: '';\
									position: absolute;\
									width: "+(div_Size[i*6+0].offsetWidth+5)+"px;\
									height: "+(div_Size[i*6+0].offsetHeight+5)+"px;\
									left: 20px;\
									background-image: url("+bg_url+");\
	    							filter: blur(9px);\
									}";
				document.body.appendChild(style);
				test1[i].setAttribute("class","article_Card_Title"+i);
			}
			// 文章卡片日期背景模糊
			test1 = document.querySelectorAll(".article_Card_Date");
			for (var i = 0; i < test1.length; i++) {
				style = document.createElement('style');
				style.innerText = ".article_Card_Date"+ i +"{} \
									.article_Card_Date"+i+"::before { \
									content: '';\
									position: absolute;\
									width: "+(div_Size[i*6+1].offsetWidth+div_Size[i*6+2].offsetWidth+5)+"px;\
									height: "+(div_Size[i*6+1].offsetHeight+5)+"px;\
									left: 20px;\
									background-image: url("+bg_url+");\
	    							filter: blur(9px);\
									}";
				document.body.appendChild(style);
				test1[i].setAttribute("class","article_Card_Date"+i);
			}
			// 文章卡片文章摘要背景模糊
			test1 = document.querySelectorAll(".article_Card_Cont");
			for (var i = 0; i < test1.length; i++) {
				style = document.createElement('style');
				style.innerText = ".article_Card_Cont"+ i +"{} \
									.article_Card_Cont"+i+"::before { \
									content: '';\
									position: absolute;\
									width: "+(div_Size[i*6+3].offsetWidth+5)+"px;\
									height: "+(div_Size[i*6+3].offsetHeight+5)+"px;\
									left: 20px;\
									\
									background-image: url("+bg_url+");\
	    							filter: blur(9px);\
									}";
				document.body.appendChild(style);
				test1[i].setAttribute("class","article_Card_Cont"+i);
			}
			// 位置浏览人数背景模糊
			test1 = document.querySelectorAll(".article_Card_Views");
			for (var i = 0; i < test1.length; i++) {
				style = document.createElement('style');
				style.innerText = ".article_Card_Views"+ i +"{} \
									.article_Card_Views"+i+"::before { \
									content: '';\
									position: absolute;\
									width: "+(div_Size[i*6+4].offsetWidth+div_Size[i*6+5].offsetWidth+5)+"px;\
									height: "+(div_Size[i*6+4].offsetHeight+5)+"px;\
									left: 20px;\
									\
									background-image: url("+bg_url+");\
	    							filter: blur(9px);\
									}";
				document.body.appendChild(style);
				test1[i].setAttribute("class","article_Card_Views"+i);
			}
			*/
		<?php } ?>
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