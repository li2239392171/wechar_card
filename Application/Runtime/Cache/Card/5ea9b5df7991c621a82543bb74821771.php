<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
    <head>
        <title>语音贺卡</title>
    </head>
    <body>
        <div class="main">
            <h2>贺卡列表：</h2>
            <?php if(is_array($card_infos)): foreach($card_infos as $key=>$k): echo ($k['nid']); ?>: <?php echo ($k['message']); ?>-- <?php echo ($k['userid']); ?>: <?php echo ($k['nickname']); ?><br>
                <div class="message">
                    <div class="headimg">
                        <img src="<?php echo ($v["headimg"]); ?>"/>
                    </div>
                    <audio src="<?php echo ($v["record_path"]); ?>" controls="controls"></audio>
                </div><?php endforeach; endif; ?>
        </div>
    </body>
</html>