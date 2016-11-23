<?php
namespace Home\Controller;
use Think\Controller;
//header('Content-type:text/html; charset=utf-8');
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        //$this->success("欢迎使用 ThinkPHP！",U('wechat/index'));
        //$this->error('没错!','home/wechat/index',1);
        //$this->redirect('wchat/index');
        //echo "这是QQ！

        if(!empty($_REQUEST['nick'])){
            $_SESSION['nick']=$_REQUEST['nick'];
            $_SESSION['addre']=$_REQUEST['addre'];
            $_SESSION['himg']=$_REQUEST['himg'];
        }
        if(empty($_SESSION['wechat_user'])){
            $this->redirect('wechat/index');
        }
        else{
            $data = $_SESSION['wechat_user']['original'];
            //$data = $_SESSION['userinfo'];
            $name = $_SESSION['nick'];
            $address = $_SESSION['addre'];
            $headimg = $_SESSION['himg'];

            $this->assign('data',$data)->assign('name',$name)->assign('address',$address)->assign('headimg',$headimg);
            $this->display();
        }
    }

    public function test(){
        echo "这是test!";
    }
}