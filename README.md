## FC
一款简单的 typecho 主题

预览：[ Jstar ](https://blog.joessem.com/)

-------

## 使用

1. 下载此项目源码
2. 解压，上传 ` FC` 文件夹至网站 Typecho 根目录下的 `user/themes/` 路径
3. 到网站后台 - 外观 - 主题 中启用此主题
4. 设置外观

### 特定页面
#### 归档页面
新建独立页面，在自定义模板中选择 Archives 。
#### 友链页面
新建独立页面，在自定义模板中选择 Links 。
新增友链，使用短代码：

```
[friend_link_block]  
[friendlink link="站点地址" icon="头像地址" details="站点描述"] 站点标题 [/friendlink]  
[friendlink link="站点地址" icon="头像地址" details="站点描述"] 站点标题 [/friendlink]  
[/friend_link_block]
```

### 代码高亮
代码高亮样式来自开源项目 [prismjs](https://prismjs.com/) ，共有 8 种不同高亮样式可供选择。
选择方式： `后台-外观-设置外观-代码高亮`  
默认样式为 `Solarized-Light` 。  

### 图片点击放大

-------

## 感谢

* 感谢 [AlanDecode](https://github.com/AlanDecode) 的 [Typecho 主题起步框架](https://github.com/AlanDecode/typecho-theme-dev-framework)
