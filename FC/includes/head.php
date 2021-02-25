<?php
/**
 * head.php
 * 
 * 输出 <head> 标签，并开始 <html>、<body> 标签
 * 
 * @author      熊猫小A
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php 
    $banner = '';
    $description = '';
    if($this->is('post') || $this->is('page')){
        if(isset($this->fields->banner))
            $banner=$this->fields->banner;
        if(isset($this->fields->excerpt))
            $description = $this->fields->excerpt;
    }else{
        $description = Helper::options()->description;
    }
?>
<title><?php Contents::title($this); ?></title>
<meta name="author" content="<?php $this->author(); ?>" />
<meta name="description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
<meta property="og:title" content="<?php Contents::title($this); ?>" />
<meta property="og:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
<meta property="og:site_name" content="<?php Helper::options()->title(); ?>" />
<meta property="og:type" content="<?php if($this->is('post') || $this->is('page')) echo 'article'; else echo 'website'; ?>" />
<meta property="og:url" content="<?php $this->permalink(); ?>" />
<meta property="og:image" content="<?php echo $banner; ?>" />
<meta property="article:published_time" content="<?php echo date('c', $this->created); ?>" />
<meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>" />
<meta name="twitter:title" content="<?php Contents::title($this); ?>" />
<meta name="twitter:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content<?php echo $banner; ?> />
<?php $this->header('description=&'); ?>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/normalize.css'); ?>" />
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/main.css'); ?>" />

<script type="text/javascript"src="http://code.jquery.com/jquery-1.4.1.min.js"></script>
<link rel="stylesheet" href="<?php Utils::indexTheme('assets/viewer.min.css'); ?>" />
<script type="text/javascript"src="<?php Utils::indexTheme('js/jquery-2.1.4.min.js'); ?>"></script>
<script type="text/javascript"src="<?php Utils::indexTheme('js/viewer.min.js'); ?>"></script>
<script type="text/javascript"src="<?php Utils::indexTheme('js/jquery-viewer.min.js'); ?>"></script>

<!-- 代码高亮 -->
<link rel="stylesheet" href="<?php echo Utils::indexTheme() ?>highlight/<?php $this->options->code_High_Light_style() ?>/prism.css">
<script src="<?php echo Utils::indexTheme() ?>highlight/<?php $this->options->code_High_Light_style() ?>/prism.js"></script>
</head>

<body>