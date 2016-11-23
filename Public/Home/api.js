wx.ready(function(){    //页面加载后自动执行！！
    wx.onMenuShareTimeline({
        title:'朋友圈',
        link:'qq.com',
        imgUrl:'http://wx.jingme.net/test/Public/images/luf.ico',
        success:function(){
            console.log("成功分享！");
        }
    });
    wx.onMenuShareAppMessage({
        title:'好友',
        desc:'好诗赠友人',
        //link: 'http://wx.jingme.net/test/index.php',
        imgUrl:'http://wx.jingme.net/test/Public/images/lo.jpg',
        success:function(){
            console.log("已发送！");
        }
    });
    wx.onMenuShareQQ({
        title:'QQ',
        desc:'好诗赠友人',
        success:function () {
            window.location.href="https://www.baidu.com";
        },
        cancel:function () {
            console.log("取消QQ分享！")
        }
    });
    wx.onMenuShareWeibo({
        title:'weibo',
        desc:'好诗赠友人',
        success:function () {
            console.log('分享到微博！')
        },
        cancel:function () {
            console.log("取消weibo分享！")
        }
    });
    wx.onMenuShareQZone({
        title:'QZone',
        desc:'好诗赠友人',
        imgUrl:'http://wx.jingme.net/test/Public/images/lo.jpg',
        cancel:function () {
            console.log("取消QZone分享！")
        }
    })

});


//分享接口
$(document).ready(function(){
    $('#share').on('click',function(){
        wx.onMenuShareTimeline({
            title:'朋友圈',
            imgUrl:'http://wx.jingme.net/test/Public/images/luf.ico',
            success:function(){
                console.log("成功分享！");
            }
        })
    });

    $('#friend').on('click',function(){
        wx.onMenuShareAppMessage({
            title:'朋友',
            desc:'好诗赠友人',
            imgUrl:'http://wx.jingme.net/test/Public/images/lo.jpg',
            success:function(){
                console.log("已发送！");
            }
        })
    });

    $('#test').on('click',function(){
        wx.checkJsApi({
            jsApiList:['onMenuShareTimeline','onMenuShareAppMessage',
                'onMenuShareQQ','onMenuShareWeibo', 'onMenuShareQZone',
                'startRecord','stopRecord','onVoiceRecordEnd','playVoice',
                'pauseVoice','stopVoice','onVoicePlayEnd','uploadVoice','downloadVoice',
                'chooseImage','previewImage','uploadImage','downloadImage',
                'openLocation','scanQRCode'],
            success:function (res) {
                console.log(res);
                alert(res);
            }
        });
    });
});


//图片接口
$(document).ready(function(){
    $('#choose').on('click',function(){
        wx.chooseImage({
            count: 8, // 默认9
            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
            success: function (res) {
                var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                //alert(localIds[0]);
                var html="";
                //for(var i =0;i<)
                html+='<img src="{localIds[0]}" width="50px" height="50px">';
                html+='<img src=localIds[1] width="50px" height="50px">';
                $('#showimg').append(html);
            }
        });
    })
});


//音频接口
$(document).ready(function () {
    var localId;
    var serverId;
    $('#start').on('click',function () {
        wx.startRecord();
    });

    $('#stop').on('click',function () {
        wx.stopRecord({
            success: function (res) {
                localId = res.localId;
            }
        });
    });

    $('#record').on('click',function () {

        wx.onVoiceRecordEnd({
            // 录音时间超过一分钟没有停止的时候会执行 complete 回调
            complete: function (res) {
                localId = res.localId;
            }
        });
    });

    $('#play').on('click',function () {
        wx.playVoice({
            localId: localId, // 需要播放的音频的本地ID，由stopRecord接口获得
        });
    });

    $('#pauseplay').on('click',function(){
        wx.pauseVoice({
            localId: localId,
        });
    });

    $('#stopplay').on('click',function(){
        wx.stopVoice({
            localId: localId,
        });
    });

    $('#playend').on('click',function () {
        wx.onVoicePlayEnd({
            success:function (res) {
                localId = res.localId;
            }
        });
    });

    $('#upload').on('click',function () {
        wx.uploadVoice({
            localId: localId,
            isShowProgressTips: 1,
            success:function (res) {
                serverId = res.serverId;
            }
        });
    });

    $('#download').on('click',function () {
        //alert(serverId);
        wx.downloadVoice({
            serverId: serverId,
            isShowProgressTips: 1,

            success:function (res) {
                //localId = res.localId;
                //console.log(res);
                //alert(res);
                 //alert(serverId);
                // alert(localId);
                down();
            }
        });
    });

    function down() {
        //alert("duide");
        $.ajax({
            url: "api/downloadVoice",
            type: "POST",
            data: "serverId="+serverId,
            success:function (result) {
                $('#res').html(result);
            }
        });
    }

});


//其他接口
$(document).ready(function () {
    var result;
    $('#openlocation').on('click',function () {
        wx.openLocation({
            latitude: 100, // 纬度，浮点数，范围为90 ~ -90
            longitude: 50, // 经度，浮点数，范围为180 ~ -180。
            name: '', // 位置名
            address: '', // 地址详情说明
            scale: 1, // 地图缩放级别,整形值,范围从1~28。默认为最大
            infoUrl: '' // 在查看位置界面底部显示的超链接,可点击跳转
        });
    });

    $('#getlocation').on('click',function () {
        wx.getLocation({
            type: 'gcj02', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                alert(latitude);
            }
        });
    });

    $('#erweima').on('click',function () {
        wx.scanQRCode({
            needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
            scanType: ["qrCode","barCode"], // 可以指定扫二维码还是一维码，默认二者都有
            success: function (res) {
                result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
                //alert(result);
            }
        });
    });

});