<?php
/**
 * Created by PhpStorm.
 * User: lgq
 * Date: 2016/11/4
 * Time: 11:37
 */
namespace Home\Controller;
include '/vendor/autoload.php';  // 引入 composer 入口文件
use Think\Controller;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller{
    public $options = [         //配置
        'debug' => true,
        'app_id' => 'wx4abfc247626485fb',
        'secret' => 'a37fd05fba8998d46bbd4de4cc3fffc2',
        //'token' => 'test',

        'log' => [
            'level' => 'debug',
            'file' => 'tmp/easywechat.log',
        ],

        'oauth' => [
            'scopes' => ['snsapi_userinfo'],      //"snsapi_base"方式，默认授权，只能得到id
            'callback' => '/test/index.php/home/wechat/callback',
        ],

    ];

    protected $app;
    protected $oauth;
    protected $user;

    // 使用配置来初始化一个项目。
    public function _initialize()
    {
        $this->app = new Application($this->options);
    }

    public function index(){
        //echo "这是微信！";
        //$this->redirect('index/test');

        $this->oauth = $this->app->oauth;
        if(empty($_SESSION['wechat_user'])){
            $this->oauth->redirect()->send();
        }
        else{
            $this->user = $_SESSION['wechat_user'];

            $targetUrl = '/test/index.php';

            header('location:'.$targetUrl);
        }
    }

    public function callback(){
        $app=new Application($this->options);
        $this->oauth=$app->oauth;
        $this->user = $this->oauth->user();

        $_SESSION['wechat_user'] = $this->user->toArray();
        $_SESSION['userinfo'] = $this->user->getOriginal();

        $url = '/test/index.php';

        header('location:'.$url);
        //var_dump($_SESSION['wechat_user']);
    }

    public function news(){
        echo "<a href='http://wx.jingme.net/test/index.php/home/talk/'>对话</a>";
        echo "这是news"."<br/>";

        //echo $_SESSION['wechat_user']['id']."<br>";
        //echo $_SESSION['wechat_user']['nickname']."<br><br>";

        var_dump($_SESSION['wechat_user']);
        //session_start();
        unset($_SESSION['wechat_user']);
    }

}