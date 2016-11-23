<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>贺卡</title>
        <script type="javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <link rel="stylesheet" type="text/css" href="/test/Public/home/index.css">
    </head>
    <body>
        <div class="main">
            <h1>节日贺卡</h1>
            <div><img class="headimg" src="<?php echo ($data['headimgurl']); ?>"></div>
            <div class="address"><?php echo ($data["province"]); ?>-<?php echo ($data["city"]); ?></div>
            <div class="nickname">
                致<span id="nick"><?php echo ($data["nickname"]); ?></span>：<br>
                祝您节日快乐！<br>
                开心每一天！
            </div>

            <div class="sender">
                来自位于<span><?php echo ($address); ?></span>的朋友<span>李观强（<?php echo ($name); ?>）</span>的问候。
            </div>
            <div><img class="headimg" src="<?php echo ($headimg); ?>"></div>
        </div>
    </body>
</html>