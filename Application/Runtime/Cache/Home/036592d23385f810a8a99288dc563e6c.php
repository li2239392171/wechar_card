<?php if (!defined('THINK_PATH')) exit();?><!doctype>
<html>
    <head>
        <script src="/test/Public/home/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <script src="/test/Public/home/api.js"></script>
        <script src="/test/Public/home/ajax.js"></script>
        <script>
            wx.config(<?php echo ($data); ?>);
        </script>

        <title>古· 诗</title>
    </head>
    <body>
        <div style="font-size: 300%;color: #000000;">
            <pre style="font-weight: bold;">
                   钱塘湖春行
                (12138人评分) 8.0
                朝代：唐代
                作者：白居易
        原文：
        孤山寺北贾亭西，水面初平云脚低。
        几处早莺争暖树，谁家新燕啄春泥。
        乱花渐欲迷人眼，浅草才能没马蹄。
        最爱湖东行不足，绿杨阴里白沙堤。
            </pre>
            <a id="test" href="#">接口测试</a>
            <a id="share" href="#">一键分享</a>
            <a id="friend" href="#">转发</a>
            <br>
            <button id="choose" style="width: 200px;height: 100px;font-size: 120%;">选图</button>
            <div id="showimg"></div>
            <br><br>

            <button id="start" style="width: 200px;height: 100px;font-size: 120%;">开始</button>
            <button id="stop" style="width: 200px;height: 100px;font-size: 120%;">停止</button>
            <button id="record" style="width: 200px;height: 100px;font-size: 120%;">监听</button>
            <button id="play" style="width: 200px;height: 100px;font-size: 120%;">播放</button>
            <br><br>

            <button id="pauseplay" style="width: 200px;height: 100px;font-size: 120%;">暂停</button>
            <button id="stopplay" style="width: 200px;height: 100px;font-size: 80%;">停止播放</button>
            <button id="playend" style="width: 250px;height: 100px;font-size: 80%;">监听播放完毕</button>
            <br><br>

            <button id="upload" style="width: 200px;height: 100px;font-size: 120%;">上传</button>
            <button id="download" style="width: 200px;height: 100px;font-size: 120%;">下载</button>
            <span id="res"></span>
            <br><br>

            <button id="openlocation" style="width: 200px;height: 100px;font-size: 80%;">打开位置</button>
            <button id="getlocation" style="width: 200px;height: 100px;font-size: 80%;">获取位置</button>
            <button id="erweima" style="width: 200px;height: 100px;font-size: 120%;">扫码</button>
        </div>
    </body>
</html>