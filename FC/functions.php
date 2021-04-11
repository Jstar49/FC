<?php
/**
 * functions.php
 * 
 * 初始化
 * 
 * @author      Jstar
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<?php

require_once("libs/Utils.php");
require_once("libs/Contents.php");

/**
 * 注册文章解析 hook
 * 具体的解析代码需要在 Contents::parseContent() 方法中实现
 * 解析不会改变数据库中的内容，体现在文章前台输出、RSS 输出时
 */
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Contents','parseContent');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Contents','parseContent');

/**
 * 主题启用时执行的方法
 */
function themeInit() {
    
    // 首页及分类文章显示数量
    // if ($archive->is('index')) {
    //     $archive->parameter->pageSize = 5; 
    // }elseif($archive->is('archive')){
    //     $archive->parameter->pageSize = 10; 
    // }

    /**
     * 重置某些设置项，采用数据库查询方式完成
     */
    $db = Typecho_Db::get();
    
    /* 关闭评论反垃圾保护，使用 PJAX 时可能需要取消注释以下 4 行 */
    // $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsAntiSpam');
    // $db->query($query);
    // $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsCheckReferer');
    // $db->query($query);

    /* 设置评论最大嵌套层数 */
    $query = $db->update('table.options')->rows(array('value'=>'999'))->where('name=?', 'commentsMaxNestingLevels');
    $db->query($query);

    /* 强制新评论在前 */
    $query = $db->update('table.options')->rows(array('value'=>'DESC'))->where('name=?', 'commentsOrder');
    $db->query($query);

    /* 默认显示第一页评论 */
    $query = $db->update('table.options')->rows(array('value'=>'first'))->where('name=?', 'commentsPageDisplay');
    $db->query($query);
}


// 自定义短代码
function getContentTest($content) {
	 // ============ 友链 ============ 
    $pattern = '/\[(friend_link_block)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<div class="friend_link_block" >
                        $2
                    </div>';
    $content = preg_replace($pattern, $replacement, $content);

	$pattern = '/\[(friendlink) link=\"(.*?)\" icon=\"(.*?)\" details=\"(.*?)\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<div class="friend_link" >
                        <div class="friend_block">
                            <img class="friend_link_icon" src="$3" />
                            <div class="friend_link_info">
                                <div class="friend_link_title"><a class="friend_link_title" target="_blank" href="$2">$5</a></div>
                                
                                <div class="friend_link_details">$4</div>
                            </div>
                        </div>
    				</div>';
    $content = preg_replace($pattern, $replacement, $content);

    //  ============ 下拉短代码 ============ 
    $pattern = '/\[(details) title=\"(.*?)\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<details class="code_details">
    					<summary class="code_summary">$2</summary>
    					$3
    				</details>';
    $content = preg_replace($pattern, $replacement, $content);

    // ============ 文章图片适应 ============ 
    $pattern = '/\<(img) src=\"(.*?)\"\>/';
    $replacement = '<p><img class="content_images" src="$2"></p>';
    $content = preg_replace($pattern, $replacement, $content);

    // ============ 提示 =============
    // 警告
    $pattern = '/\[(tips) category=\"warning\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<p class="code_warning">
    					<i class="fa fa-exclamation-circle" style="font-size:20px;">  </i>
    					$2
    				</p>';
    $content = preg_replace($pattern, $replacement, $content);
    // 注意
    $pattern = '/\[(tips) category=\"attention\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<p class="code_attention">
    					<i class="fa fa-exclamation" style="font-size:20px;">  </i>
    					$2
    				</p>';
    $content = preg_replace($pattern, $replacement, $content);
    // 说明
    $pattern = '/\[(tips) category=\"explain\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<p class="code_explain">
    					<i class="fa fa-bell" style="font-size:20px;">  </i>
    					$2
    				</p>';
    $content = preg_replace($pattern, $replacement, $content);

    // Label
    // Red
    $pattern = '/\[(label) color=\"red\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<span class="code_label_red">$2</span>';
    $content = preg_replace($pattern, $replacement, $content);
    // Green
    $pattern = '/\[(label) color=\"green\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<span class="code_label_green">$2</span>';
    $content = preg_replace($pattern, $replacement, $content);
    // blue
    $pattern = '/\[(label) color=\"blue\"\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '<span class="code_label_blue">$2</span>';
    $content = preg_replace($pattern, $replacement, $content);

    return $content;
}

/**
 * 	浏览次数
 *	一个 cookie 算一个
 */
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
		$views = Typecho_Cookie::get('extend_contents_views');
	    if(empty($views)){
	        $views = array();
	    }else{
	        $views = explode(',', $views);
	    }
		if(!in_array($cid,$views)){
		    $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
			array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
		}
    }
    echo $row['views'];
}

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {
	// 文章卡片背景图
	$index_card_image = new Typecho_Widget_Helper_Form_Element_Text('index_card_image', null, null, _t('文章头图'), _t('文章头图会显示在文章的顶部。'));
    $layout->addItem($index_card_image);
}

/**
 * 主题后台设置
 */
function themeConfig($form) {
    $backUrl = new Typecho_Widget_Helper_Form_Element_Text('backUrl', NULL, NULL, _t('页面背景图片地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($backUrl);

    //页尾信息
    $footerEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerEcho', NULL, NULL, _t('自定义脚部信息'), _t('填写 html 代码，将输出在 &lt;foot&gt; 标签中，可以在这里写上统计代码'));
    // $footerEcho->setAttribute('class', 'theme-setting-content theme-setting-development');
    $form->addInput($footerEcho);

    // 代码高亮风格选择
    $code_High_Light_style = new Typecho_Widget_Helper_Form_Element_Select('code_High_Light_style', array('0' => 'Twilight', '1' => 'Tomorrow-Night', '2' => 'Solarized-Light', '3' => 'Okaidia', '4' => 'Funky', '5' => 'Default', '6' => 'Dark', '7' => 'Coy'), '2', _t('代码高亮'), _t('选择代码高亮样式，默认为 Twilight '));
    $form->addInput($code_High_Light_style);

    $Ttheme = new Typecho_Widget_Helper_Form_Element_Radio('Ttheme',
        array('0' => _t('黑白'),
        '1' => _t('白黑')),
        '0', _t('主题配色'));
    $form->addInput($Ttheme);

    //文章尾部信息、开源类别
    $contents_tail_info = new Typecho_Widget_Helper_Form_Element_Textarea('contents_tail_info', NULL, NULL, _t('文章尾部信息'), _t('填写 html 代码，将输出在 &lt;contents_tail_info&gt; 标签中，可以在这里写上统计代码'));
    // $footerEcho->setAttribute('class', 'theme-setting-content theme-setting-development');
    $form->addInput($contents_tail_info);

    //首页文章卡片背景
    $index_card_background = new Typecho_Widget_Helper_Form_Element_Text('index_card_background', NULL, NULL, _t('首页文章卡片背景'), _t('填写图片 url 地址'));
    $form->addInput($index_card_background);
}

