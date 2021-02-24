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

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {

}

// 友链短代码
function getContentTest($content) {
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

    return $content;
}

/**
 * 主题后台设置
 */
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    $footerEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerEcho', NULL, NULL, _t('自定义脚部信息'), _t('填写 html 代码，将输出在 &lt;footer&gt; 标签中，可以在这里写上统计代码'));
    // $footerEcho->setAttribute('class', 'theme-setting-content theme-setting-development');
    $form->addInput($footerEcho);
}