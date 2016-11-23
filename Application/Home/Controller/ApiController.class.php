<?php
/**
 * Created by PhpStorm.
 * User: lgq
 * Date: 2016/11/8
 * Time: 9:57
 */
namespace Home\Controller;
use Think\App;
use Think\Controller;
include "/vendor/autoload.php";
use EasyWeChat\Foundation\Application;

class ApiController extends Controller{
    protected $config=[
        'debug'=>true,
        'app_id' => 'wx4abfc247626485fb',
        'secret' => 'a37fd05fba8998d46bbd4de4cc3fffc2',

        'log'=>[
            'level'=>'debug',
            'file'=>'/tmp/easywechat.log',
        ],

        'oauth'=>[
            'scopes'=>'snsapi_userinfo',
            'callback'=>'/test/index.php/home/api/callback',
        ]

    ];

    protected $app;

    protected function _initialize(){
        $this->app = new Application($this->config);
    }

    public function index(){
        //$app = new Application($this->config);
        $js = $this->app->js;
        $data = $js->config(array('onMenuShareTimeline','onMenuShareAppMessage',
            'onMenuShareQQ','onMenuShareWeibo', 'onMenuShareQZone',
            'startRecord','stopRecord','onVoiceRecordEnd','playVoice',
            'pauseVoice','stopVoice','onVoicePlayEnd','uploadVoice','downloadVoice',
            'chooseImage','previewImage','uploadImage','downloadImage',
            'openLocation','scanQRCode'),false);
        $this->assign('data',$data);
        $this->display('api/api');
    }

    public function downloadVoice(){
        $serverId = $_REQUEST['serverId'];

        //$app = new Application($this->config);
        //$material = $app->material;
        $time=time();
        $temporary = $this->app->material_temporary;
        $res = $temporary->download($serverId,"tmp",$time);

        echo $res;
    }
}