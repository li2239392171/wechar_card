<?php
namespace Card\Controller;
use Think\Controller;
include '/vendor/autoload.php';
use EasyWeChat\Foundation\Application;

class WechatController extends Controller{
    protected $configs = [
        'debug' => true,
        'app_id' => 'wx4abfc247626485fb',
        'secret' => 'a37fd05fba8998d46bbd4de4cc3fffc2',

        'log' =>[
            'level' => 'debug',
            'file' => 'tmp/card_easywechat.log',
        ],

        'oauth' =>[
            'scopes' => ['snsapi_userinfo'],
            'callback' => '/test/index.php/card/wechat/callback',
        ],

    ];

    protected $app;
    protected $oauth;
    protected $user;

    protected function _initialize(){
        $this->app = new Application($this->configs);
        $this->oauth = $this->app->oauth;
    }

    public function index(){
        //$this->oauth = $this->app->oauth;
        $this->oauth->redirect()->send();
    }

    /**
     * 回调函数
     */
    public function callback(){
        $this->user = $this->oauth->user();
        $_SESSION['user'] = $this->user->getOriginal();

        $obj = D('Users');
        $result = $obj->finduser($_SESSION['user']['openid']);
        if(!$result){
            $obj -> adduser($_SESSION['user']);
        }

        $targeturl = '/test/index.php/card/';
        header('location:'.$targeturl);
    }

    /**
     * 开放接口配置
     */
    public function api(){
        $js=$this->app->js;
        $data = $js->config(array('onMenuShareAppMessage','onMenuShareTimeline'),false);
        $this->assign('data',$data);
        $this->display('users/record');
    }
}